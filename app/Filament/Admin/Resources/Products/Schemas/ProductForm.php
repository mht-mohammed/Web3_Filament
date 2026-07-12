<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\Action;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make("Product Info")
                        ->icon(Heroicon::AcademicCap)
                        ->description("Fill all the fields")
                        ->schema([
                            Group::make()
                                ->schema([
                                    TextInput::make("name")->required(),
                                    TextInput::make("sku"),
                                ])->columns(2),
                            MarkdownEditor::make("description")
                        ]),
                    Step::make("Pricing & Stock")
                        ->description("Fill price and stock")
                        ->schema([
                            Group::make()
                                ->schema([
                                    TextInput::make("price")->numeric()->required(),
                                    TextInput::make("stock")->integer()->required(),
                                ])->columns(2)
                        ]),
                    Step::make("Media & Status")
                        ->description("Fill midea and status")
                        ->schema([
                            FileUpload::make("image")->disk("public")->directory("products"),
                            Checkbox::make("is_active"),
                            Checkbox::make("is_featured")
                        ])
                ])
                    ->columnSpanFull()
                    ->skippable()  /* ignore the valdation */
                    ->submitAction(
                        Action::make("save")
                            ->label("Save Product")
                            ->button()
                            ->color("primary")
                            ->submit("save")
                            ->icon(Heroicon::Check)
                    )
            ]);
    }
}
