<?php

declare(strict_types=1);

namespace App\Filament\Support;

use App\Services\Documents\FactoryPdf;
use App\Services\Workflow\WorkflowService;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

abstract class EditsGarmentRecord extends EditRecord
{
    protected function getHeaderActions(): array
    {
        $actions = [];
        $record = $this->getRecord();
        if ($record instanceof Model && isset($record->status)) {
            $targets = config('workflows.'.$record->getTable().'.'.$record->status, []);
            foreach ($targets as $target) {
                $actions[] = Action::make('to_'.$target)
                    ->label(str($target)->headline()->toString())
                    ->requiresConfirmation()
                    ->action(function () use ($record, $target): void {
                        app(WorkflowService::class)->transition($record, (string) $target, auth()->user());
                        $this->refreshFormData(['status']);
                        Notification::make()->title(__('garment.actions.transitioned'))->success()->send();
                    });
            }
        }

        if ($record instanceof Model && in_array($record->getTable(), config('garment.pdf_tables', []), true)) {
            $actions[] = Action::make('pdf')
                ->label('PDF')
                ->icon('heroicon-o-document-arrow-down')
                ->action(fn () => app(FactoryPdf::class)->download($record));
        }

        $actions[] = DeleteAction::make();

        return $actions;
    }
}
