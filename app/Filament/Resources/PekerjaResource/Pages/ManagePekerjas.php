<?php

namespace App\Filament\Resources\PekerjaResource\Pages;

use App\Filament\Resources\PekerjaResource;
use App\Imports\PekerjaImport;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRecords;
use Maatwebsite\Excel\Facades\Excel;

class ManagePekerjas extends ManageRecords
{
    protected static string $resource = PekerjaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('Import Excel')
                ->form([
                    FileUpload::make('file')
                        ->label('Pilih File Excel')
                        ->required()
                        ->acceptedFileTypes([
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                            'application/vnd.ms-excel',
                            'text/csv',
                        ]),
                ])
                ->action(function (array $data): void {
                    Excel::import(new PekerjaImport, $data['file']);
                    Notification::make()
                        ->title('Berhasil mengimpor pekerja.')
                        ->success()
                        ->send();
                })
                ->modalHeading('Import Data Pekerja')
                ->color('success'),
        ];
    }
}
