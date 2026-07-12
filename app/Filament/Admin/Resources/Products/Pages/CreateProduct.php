<?php

namespace App\Filament\Admin\Resources\Products\Pages;

use App\Filament\Admin\Resources\Products\ProductResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function getFormActions(): array   /* remove the default actions  ( create , Create & create another , Cancel ) */
    {
        return [];
    }
}
