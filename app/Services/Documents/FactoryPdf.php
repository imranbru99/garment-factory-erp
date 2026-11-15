<?php

declare(strict_types=1);

namespace App\Services\Documents;

use App\Support\BanglaDate;
use Illuminate\Database\Eloquent\Model;
use ImranDev\UnicodePdf\Facades\UnicodePdf;
use Symfony\Component\HttpFoundation\Response;
use Tarikh\Tarikh;
use Throwable;

class FactoryPdf
{
    public function render(Model $record): string
    {
        $date = new Tarikh('now', new \DateTimeZone('Asia/Dhaka'));
        $html = view('pdf.generic', [
            'title' => (string) $record->getAttribute('name'),
            'table' => $record->getTable(),
            'rows' => collect($record->getAttributes())->except(['two_factor_secret', 'password'])->all(),
            'bangla_date' => BanglaDate::gregorian($date),
        ])->render();

        try {
            return UnicodePdf::loadHtml($html)->output();
        } catch (Throwable) {
            return UnicodePdf::loadHtml('<h1>'.e((string) $record->getAttribute('name')).'</h1>')->output();
        }
    }

    public function download(Model $record): Response
    {
        $binary = $this->render($record);
        $name = str($record->getTable())->singular().'-'.$record->getKey().'.pdf';

        return response($binary, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="'.$name.'"',
        ]);
    }
}
