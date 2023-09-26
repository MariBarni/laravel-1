<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Resources\Pages\Page;


class TokenProfiles extends Page
{
    protected static string $resource = ProfileResource::class;
   


    protected static string $view = 'filament.resources.profile-resource.pages.token-profiles';
}
