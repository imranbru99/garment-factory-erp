<?php

declare(strict_types=1);

namespace App\Filament\Support;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Writer\XLSX\Writer;
use Symfony\Component\HttpFoundation\StreamedResponse;

abstract class ListsGarmentRecords extends ListRecords
{
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('export_excel')
                ->label(__('garment.actions.export'))
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn (): StreamedResponse => $this->exportExcel()),
        ];
    }

    protected function exportExcel(): StreamedResponse
    {
        $model = static::getResource()::getModel();
        $records = $model::query()->limit(5000)->get();
        $filename = str($model)->classBasename()->snake()->append('.xlsx');

        return response()->streamDownload(function () use ($records): void {
            $writer = new Writer;
            $writer->openToFile('php://output');
            if ($records->isEmpty()) {
                $writer->addRow(Row::fromValues(['empty']));
            } else {
                $headers = array_keys($records->first()->getAttributes());
                $writer->addRow(Row::fromValues($headers));
                foreach ($records as $record) {
                    $writer->addRow(Row::fromValues(array_map(
                        fn ($value) => is_scalar($value) || $value === null ? $value : json_encode($value),
                        $record->getAttributes(),
                    )));
                }
            }
            $writer->close();
        }, (string) $filename, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
    }
}
