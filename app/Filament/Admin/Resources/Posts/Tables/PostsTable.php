<?php

namespace App\Filament\Admin\Resources\Posts\Tables;

use Filament\Actions\{BulkActionGroup, DeleteBulkAction, EditAction};
use Filament\Tables\Table;
use Filament\Tables\Columns\{ImageColumn, TextColumn};
class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                imageColumn::make('image')->disk('public'),
                TextColumn::make('title'),
                TextColumn::make('slug'),
                TextColumn::make('category.name')->label('Category_name'),
                TextColumn::make('category.id')->label('Category_id'),
                TextColumn::make('color'),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
