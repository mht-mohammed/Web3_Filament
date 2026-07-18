<?php

namespace App\Filament\Manager\Resources\Users\Pages;

use App\Filament\Manager\Resources\Users\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Icons\Heroicon;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title("User Created")
            ->body("User Created Successfully")
            ->icon(Heroicon::AcademicCap)
            ->success();
    }
}
