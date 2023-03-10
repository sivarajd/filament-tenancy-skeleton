<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\Admin\CentralUser;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $email = $data['email'];
        $centralUser = tenancy()->central(function () use ($email) {
            
            return CentralUser::where('email',$email)->first();

        });

        $data['global_id'] = ($centralUser) ? $centralUser['global_id'] : null;

        return $data;
    }
}
