<?php

namespace App\Filament\Admin\Resources\Products\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Icons\Heroicon;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ProductInfolist
{ 
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Tabs::make("Tabs")
                    ->tabs([
                        Tab::make("Product Info")
                            ->icon(Heroicon::AcademicCap)
                            ->schema([
                                TextEntry::make("id")
                                    ->label("Product ID")
                                    ->weight("bold")
                                    ->color("primary"),
                                TextEntry::make("name")
                                    ->label("Product Name")
                                    ->weight("bold")
                                    ->color("primary"),
                                TextEntry::make("sku")
                                    ->label("Product SKU")
                                    ->weight("bold")
                                    ->badge()
                                    ->color("success"),
                                TextEntry::make("description")
                                    ->label("Product Description")
                                    ->weight("bold")
                                    ->color("primary"),
                                TextEntry::make("created_at")
                                    ->label("Product Created At")
                                    ->weight("bold")
                                    ->color("danger")
                                    ->date("m/d/Y"),
                            ]),

                        Tab::make("Pricing")
                                 ->icon(Heroicon::CurrencyDollar)
                                 ->badge(10)
                                 ->badgeColor("info")
                                 ->schema([
                             TextEntry::make("price")
                                 ->label("Product Price")
                                 ->weight("bold")
                                 ->color("primary")
                                 ->icon(Heroicon::CurrencyDollar),
                             TextEntry::make("stock")
                                 ->label("Product Stock")
                                 ->weight("bold")
                                 ->color("primary")
                                 ->icon(Heroicon::ArchiveBox),
                            ]),

                        Tab::make("Media & Status")
                                ->icon(Heroicon::Photo)
                                 ->schema([
                                        ImageEntry::make("image")
                                            ->label("Product Image")
                                            ->disk("public"),
                                        IconEntry::make("is_active")
                                            ->label("Is Active ?")
                                            ->boolean(),

                                        IconEntry::make("is_featured")
                                            ->label("Is Featured ?")
                                            ->boolean()
                                            ->icon(Heroicon::Star)
                                            ->color("warning"),
                                            ])

                    ])->columnSpanFull()->vertical()

            ]);
    }
}
