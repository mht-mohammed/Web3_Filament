<?php

namespace App\Filament\Admin\Resources\Users\Pages;

use App\Filament\Admin\Resources\Users\UserResource;
use App\Filament\Admin\Resources\Users\Widgets\UserCounterWidget;
use App\Filament\Exports\UserExporter;
use App\Filament\Imports\UserImporter;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            ExportAction::make()
                ->exporter(UserExporter::class),
            ImportAction::make()
                ->importer(UserImporter::class)
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UserCounterWidget::class,
        ];
    }
}
