<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home']);
Route::get('/about', fn () => app(WebsiteController::class)->page('about'));
Route::get('/products', [WebsiteController::class, 'products']);
Route::get('/products/{slug}', [WebsiteController::class, 'product']);
Route::get('/facility', [WebsiteController::class, 'facility']);
Route::get('/machinery', [WebsiteController::class, 'machinery']);
Route::get('/quality', [WebsiteController::class, 'quality']);
Route::get('/compliance', [WebsiteController::class, 'compliance']);
Route::get('/sustainability', [WebsiteController::class, 'sustainability']);
Route::get('/clients', [WebsiteController::class, 'clients']);
Route::get('/rfq', [WebsiteController::class, 'rfqForm']);
Route::post('/rfq', [WebsiteController::class, 'rfq']);
Route::get('/careers', [WebsiteController::class, 'careers']);
Route::post('/careers', [WebsiteController::class, 'apply']);
Route::get('/news', [WebsiteController::class, 'news']);
Route::get('/news/{slug}', [WebsiteController::class, 'article']);
Route::get('/downloads', [WebsiteController::class, 'downloads']);
Route::get('/contact', [WebsiteController::class, 'contactForm']);
Route::post('/contact', [WebsiteController::class, 'contact']);
Route::get('/faq', [WebsiteController::class, 'faq']);
Route::get('/privacy', fn () => app(WebsiteController::class)->page('privacy'));
Route::get('/terms', fn () => app(WebsiteController::class)->page('terms'));
Route::get('/code-of-conduct', fn () => app(WebsiteController::class)->page('code-of-conduct'));
Route::get('/grievance', [WebsiteController::class, 'grievanceForm']);
Route::post('/grievance', [WebsiteController::class, 'grievance']);
Route::get('/suppliers/register', [WebsiteController::class, 'supplierForm']);
Route::post('/suppliers/register', [WebsiteController::class, 'supplier']);
Route::get('/floor-pwa', fn () => view('floor.pwa'));
Route::view('/maintenance', 'errors.503');
Route::get('/sitemap.xml', [WebsiteController::class, 'sitemap']);
Route::get('/robots.txt', fn () => response("User-agent: *\nAllow: /\nSitemap: ".url('/sitemap.xml')."\n", 200, ['Content-Type' => 'text/plain']));
