<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PresensiResource\Pages;
use App\Filament\Resources\PresensiResource\RelationManagers;
use App\Models\Presensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PresensiResource extends Resource
{
    protected static ?string $model = Presensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Presensi';
    protected static ?string $label = 'Presensi';
    protected static ?string $pluralLabel = 'Data Presensi Pekerja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pekerja')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_pekerja')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('waktu_presensi')
                    ->label('Waktu Presensi')
                    ->default(now())
                    ->disabled()
                    ->dehydrated(true)
                    ->required(),
                Forms\Components\Select::make('keterangan')
                ->label('Keterangan')
                ->options([
                    'Masuk' => 'Masuk',
                    'Sakit' => 'Sakit',
                    'Izin' => 'Izin',
                ])
                ->required()
                ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pekerja')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nomor_pekerja')
                    ->searchable(),
                Tables\Columns\TextColumn::make('waktu_presensi')
                     ->dateTime()
                     ->sortable(),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePresensis::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->orderBy('waktu_presensi', 'desc');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) \App\Models\Presensi::count();
    }

}
