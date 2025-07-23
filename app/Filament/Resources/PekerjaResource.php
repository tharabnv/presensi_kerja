<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PekerjaResource\Pages;
use App\Models\Pekerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PekerjaResource extends Resource
{
    protected static ?string $model = Pekerja::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Data Pekerja';
    protected static ?string $label = 'Pekerja';
    protected static ?string $pluralLabel = 'Data Pekerja'; 

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
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->helperText('Contoh: balaiyasayk@gmail.com')
                    ->maxLength(255),
                Forms\Components\Select::make('divisi')
                    ->options([
                        'IT' => 'IT',
                        'SDM' => 'SDM',
                        'Produksi' => 'Produksi',
                        'Marketing' => 'Marketing',
                        'Keuangan' => 'Keuangan',
                    ])
                    ->required()
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('divisi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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
            'index' => Pages\ManagePekerjas::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) \App\Models\Pekerja::count();
    }
}
