<?php

namespace App\Filament\Resources\PresensiResource\Pages;

use App\Exports\PresensiExport;
use App\Filament\Resources\PresensiResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ManagePresensis extends ManageRecords
{
    protected static string $resource = PresensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('Export Excel')
                ->action(function (): StreamedResponse {
                    return Excel::download(new PresensiExport, 'presensi.xlsx');
                })
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success'),
        ];
    }
}
