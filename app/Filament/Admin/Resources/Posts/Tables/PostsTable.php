<?php

namespace App\Filament\Admin\Resources\Posts\Tables;

use App\Models\Post;
use Dom\Text;
use Filament\Actions\{BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction, ReplicateAction , Action};
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\{IconColumn, ImageColumn, TextColumn};
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("id")
                        ->label("ID")
                        ->toggleable(isToggledHiddenByDefault:true),
                imageColumn::make('image')->disk('public')->toggleable(),
                TextColumn::make('title')->sortable()->searchable()->toggleable(),
                TextColumn::make('slug')->sortable()->searchable()->toggleable(),
                TextColumn::make('category.name')->label('Category_name')->sortable()->searchable()->toggleable(),
                TextColumn::make('category.id')->label('Category_id')->toggleable(),
                TextColumn::make('color')->toggleable(),
                TextColumn::make("created_at")
                    ->label("Created At")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make("tags")
                        ->label("Tags")
                        ->toggleable(isToggledHiddenByDefault:true),
                IconColumn::make("published")
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault:true),

            ])->defaultSort("title" , "asc")  # when you move from this page (like posta) to anoter page (like products)
            ->filters([
                Filter::make("created_at")
                ->label("Creation Date")
                ->schema([
                    DatePicker::make("created_at")
                    ->label("Select Date")
                ])
                ->query(function($query, $data){
                     return $query
                ->when($data["created_at"], function($q, $date){
                        $q->whereDate("created_at", $date);
                    });
                }),
                SelectFilter::make("category_id")
                    ->label("Select Category")
                    ->relationship("category" , "name")
                    ->preload()


            ])
            ->recordActions([
                Action::make("Status")
                ->icon(Heroicon::AcademicCap)
                ->label("status change")
                    ->schema([
                        Checkbox::make("published")
                    ])
                    ->action(function(array $data , Post $record){
                        $record->published = $data['published'];
                        $record->save();

                    }),
                    
                ReplicateAction::make(),
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
