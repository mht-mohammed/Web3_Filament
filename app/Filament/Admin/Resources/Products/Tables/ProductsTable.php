<?php

namespace App\Filament\Admin\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
USE Filament\Tables\Columns\TextColumn;
USE Filament\Tables\Columns\ImageColumn;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
                ImageColumn::make("image")->disk("public"),
                TextColumn::make("name"),
                TextColumn::make("sku"),
                TextColumn::make("price"),
                TextColumn::make("stock"),

            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
