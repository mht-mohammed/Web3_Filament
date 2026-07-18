<?php

namespace App\Filament\Manager\Resources\Users\Pages;

use App\Filament\Manager\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->successNotification(
                    Notification::make()
                        ->title("User Deleted")
                        ->body("User Deleted Successfully")
                        ->icon(Heroicon::AcademicCap)
                        ->success()
                ),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title("User Updated")
            ->body("User Updated Successfully")
            ->icon(Heroicon::AcademicCap)
            ->success();
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['password'] = null;
        return $data;
    }
}
