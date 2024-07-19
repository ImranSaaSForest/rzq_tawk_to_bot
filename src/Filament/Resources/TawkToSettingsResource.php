<?php
// src/Filament/Resources/TawkToSettingsResource.php
namespace Vendor\Package\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\ResourceForm;
use Filament\Resources\ResourceTable;
use Vendor\Package\Models\TawkToSettings;
use Filament\Tables\Columns\TextColumn;

class TawkToSettingsResource extends Resource
{
    protected static ?string $model = TawkToSettings::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('store_id'),
                ToggleColumn::make('tawk_to_enabled')

            ]);
    }
}