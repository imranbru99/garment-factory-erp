<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CaseStudy;
use App\Models\Certificate;
use App\Models\CmsPage;
use App\Models\ContactMessage;
use App\Models\DownloadItem;
use App\Models\Employee;
use App\Models\EsgRecord;
use App\Models\Faq;
use App\Models\Grievance;
use App\Models\Inquiry;
use App\Models\JobPost;
use App\Models\Line;
use App\Models\NewsPost;
use App\Models\ProductCategory;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class WebsiteController extends Controller
{
    public function home(): View
    {
        return view('website.home', [
            'categories' => $this->rows(ProductCategory::class, fn ($query) => $query->where('is_published', true)->limit(8)),
            'news' => $this->rows(NewsPost::class, fn ($query) => $query->latest('published_at')->limit(3)),
            'certificates' => $this->rows(Certificate::class, fn ($query) => $query->where('is_public', true)->limit(8)),
            'lines' => Schema::hasTable('lines') ? Line::query()->count() : 0,
            'units' => Schema::hasTable('units') ? Unit::query()->count() : 0,
            'workers' => Schema::hasTable('employees') ? Employee::query()->count() : 0,
        ]);
    }

    public function page(string $slug): View
    {
        if (! Schema::hasTable('cms_pages')) {
            $page = null;
        } else {
            $page = CmsPage::query()->where('slug', $slug)->where('locale', app()->getLocale())->where('is_published', true)->first()
                ?? CmsPage::query()->where('slug', $slug)->where('is_published', true)->first();
        }

        if ($page === null) {
            $fallback = $this->fallbackPage($slug);
            abort_if($fallback === null, 404);

            return view('website.simple', $fallback);
        }

        return view('website.page', ['page' => $page]);
    }

    public function products(): View
    {
        return view('website.products', [
            'categories' => $this->rows(ProductCategory::class, fn ($query) => $query->where('is_published', true)->orderBy('name')),
        ]);
    }

    public function product(string $slug): View
    {
        $category = ProductCategory::query()->where('slug', $slug)->firstOrFail();

        return view('website.product', ['category' => $category]);
    }

    public function facility(): View
    {
        return view('website.simple', ['title' => __('Facility'), 'body' => $this->copy('facility')]);
    }

    public function machinery(): View
    {
        return view('website.simple', [
            'title' => __('Machinery and capacity'),
            'body' => __('Sewing lines').': '.(Schema::hasTable('lines') ? Line::query()->count() : 0).'. '.__('Units').': '.(Schema::hasTable('units') ? Unit::query()->count() : 0).'.',
        ]);
    }

    public function quality(): View
    {
        return view('website.simple', ['title' => __('Quality assurance'), 'body' => $this->copy('quality')]);
    }

    public function compliance(): View
    {
        return view('website.compliance', [
            'certificates' => $this->rows(Certificate::class, fn ($query) => $query->where('is_public', true)->orderBy('expires_on')),
        ]);
    }

    public function sustainability(): View
    {
        return view('website.simple', [
            'title' => __('Sustainability'),
            'body' => $this->copy('esg').' '.$this->esgNumbers(),
        ]);
    }

    public function clients(): View
    {
        return view('website.clients', [
            'studies' => $this->rows(CaseStudy::class, fn ($query) => $query->latest('id')->limit(12)),
        ]);
    }

    public function news(): View
    {
        return view('website.news', ['posts' => $this->rows(NewsPost::class, fn ($query) => $query->latest('published_at'))]);
    }

    public function article(string $slug): View
    {
        return view('website.page', ['page' => NewsPost::query()->where('slug', $slug)->firstOrFail()]);
    }

    public function downloads(): View
    {
        return view('website.downloads', ['items' => $this->rows(DownloadItem::class, fn ($query) => $query->latest('id'))]);
    }

    public function faq(): View
    {
        return view('website.faq', ['faqs' => $this->rows(Faq::class, fn ($query) => $query->orderBy('sort_order'))]);
    }

    public function careers(): View
    {
        return view('website.careers', [
            'jobs' => $this->rows(JobPost::class, fn ($query) => $query->where('status', 'published')->orderByDesc('id')),
        ]);
    }

    public function apply(Request $request): RedirectResponse
    {
        $this->guardSpam($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:40'],
            'job_post_id' => ['nullable', 'integer'],
            'cv' => ['nullable', 'file', 'max:4096', 'mimes:pdf,doc,docx'],
        ]);
        $path = $request->file('cv')?->store('cvs', 'local');
        Applicant::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'job_post_id' => $data['job_post_id'] ?? null,
            'cv_path' => $path,
            'status' => 'applied',
        ]);

        return back()->with('status', __('Application received.'));
    }

    public function rfqForm(): View
    {
        return view('website.rfq', ['categories' => $this->rows(ProductCategory::class, fn ($query) => $query->where('is_published', true))]);
    }

    public function rfq(Request $request): RedirectResponse
    {
        $this->guardSpam($request);
        $data = $request->validate([
            'company_name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:40'],
            'product_type' => ['required', 'string', 'max:120'],
            'qty' => ['required', 'numeric', 'min:1'],
            'target_price_minor' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);
        Inquiry::query()->create([
            'name' => $data['company_name'].' RFQ',
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'product_type' => $data['product_type'],
            'qty' => $data['qty'],
            'target_price_minor' => $data['target_price_minor'] ?? null,
            'notes' => $data['notes'] ?? null,
            'source' => 'website',
            'status' => 'new',
            'currency' => 'USD',
        ]);

        return back()->with('status', __('Inquiry received. A merchandiser will reply.'));
    }

    public function contactForm(): View
    {
        return view('website.contact', ['units' => $this->rows(Unit::class, fn ($query) => $query->orderBy('code'))]);
    }

    public function contact(Request $request): RedirectResponse
    {
        $this->guardSpam($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:160'],
            'body' => ['required', 'string', 'max:4000'],
        ]);
        ContactMessage::query()->create($data + ['status' => 'new']);

        return back()->with('status', __('Message received.'));
    }

    public function supplierForm(): View
    {
        return view('website.supplier');
    }

    public function supplier(Request $request): RedirectResponse
    {
        $this->guardSpam($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:160'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:40'],
            'category' => ['nullable', 'string', 'max:80'],
            'document' => ['nullable', 'file', 'max:4096', 'mimes:pdf,jpg,png'],
        ]);
        $supplier = Supplier::query()->create([
            'name' => $data['name'],
            'code' => 'SUP-'.strtoupper(substr(md5($data['email']), 0, 6)),
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'category' => $data['category'] ?? 'general',
        ]);
        User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => str()->password(16),
            'portal' => 'supplier',
            'supplier_id' => $supplier->id,
            'is_active' => false,
        ]);

        return back()->with('status', __('Registration received. It stays inactive until purchase approves it.'));
    }

    public function grievanceForm(): View
    {
        return view('website.grievance');
    }

    public function grievance(Request $request): RedirectResponse
    {
        $this->guardSpam($request);
        $data = $request->validate([
            'body' => ['required', 'string', 'max:4000'],
            'channel' => ['nullable', 'string', 'max:40'],
        ]);
        Grievance::query()->create([
            'name' => 'Whistleblower',
            'body' => $data['body'],
            'channel' => $data['channel'] ?? 'website',
            'confidential' => true,
            'status' => 'open',
        ]);

        return back()->with('status', __('Confidential report received.'));
    }

    public function sitemap(): Response
    {
        $urls = ['/', '/about', '/products', '/facility', '/machinery', '/quality', '/compliance', '/sustainability', '/clients', '/rfq', '/careers', '/news', '/downloads', '/contact', '/faq', '/privacy', '/terms', '/code-of-conduct', '/grievance', '/suppliers/register'];
        if (Schema::hasTable('product_categories')) {
            foreach (ProductCategory::query()->whereNotNull('slug')->pluck('slug') as $slug) {
                $urls[] = '/products/'.$slug;
            }
        }
        if (Schema::hasTable('news_posts')) {
            foreach (NewsPost::query()->whereNotNull('slug')->pluck('slug') as $slug) {
                $urls[] = '/news/'.$slug;
            }
        }

        return response()->view('website.sitemap', ['urls' => $urls])->header('Content-Type', 'application/xml');
    }

    private function guardSpam(Request $request): void
    {
        if (filled($request->input('company_website'))) {
            abort(422);
        }
    }

    /**
     * @param  class-string  $model
     * @param  Closure(mixed): mixed  $scope
     * @return Collection<int, mixed>
     */
    private function rows(string $model, Closure $scope): Collection
    {
        if (! Schema::hasTable((new $model)->getTable())) {
            return collect();
        }

        return $scope($model::query())->get();
    }

    /** @return array{title: string, body: string}|null */
    private function fallbackPage(string $slug): ?array
    {
        $pages = [
            'about' => ['title' => 'About Padma Apparel', 'body' => 'Padma Apparel Group is a woven and knit garment manufacturer in Gazipur with sewing, wash and embroidery units. Mission: ship the confirmed quantity on the ex-factory date, with the quality the buyer signed.'],
            'privacy' => ['title' => 'Privacy policy', 'body' => 'We store buyer, supplier and employee data to run orders, payroll and compliance. Access is limited by role and unit. We do not sell personal data.'],
            'terms' => ['title' => 'Terms', 'body' => 'Quotations are valid until the date printed on the quotation. Production starts after order confirmation, costing approval and material readiness.'],
            'code-of-conduct' => ['title' => 'Code of conduct', 'body' => 'No child labour, no forced labour, paid overtime within the configured legal limit, and a confidential grievance channel.'],
        ];

        return $pages[$slug] ?? null;
    }

    private function copy(string $key): string
    {
        $copies = [
            'facility' => 'Cutting, sewing, wash, embroidery, finishing and an in-house quality lab. Photo galleries are managed from the website module.',
            'quality' => 'Inline QC, end-line QC and final inspection use AQL 1.0, 1.5, 2.5 and 4.0. The lab records color fastness, shrinkage, GSM and seam strength against the buyer spec.',
            'esg' => 'Energy, water, waste and carbon are recorded per unit and published here when the record is marked for disclosure.',
        ];

        return $copies[$key] ?? '';
    }

    private function esgNumbers(): string
    {
        $record = Schema::hasTable('esg_records') ? EsgRecord::query()->latest('id')->first() : null;
        if ($record === null) {
            return '';
        }

        return 'Latest period '.$record->period.': '.$record->energy_kwh.' kWh, '.$record->water_m3.' m3 water.';
    }
}
