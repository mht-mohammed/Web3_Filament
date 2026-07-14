<?php

namespace App\Filament\Admin\Resources\Cities\Schemas;

use App\Models\Country;
use App\Models\State;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class CitiesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make("country_id")
                    ->label("Country")
                    ->options(Country::pluck("name","id"))
                    ->reactive(),
                Select::make("state_id")
                    ->label("State")
                    ->options(function (callable $get){
                        $country = $get("country_id");
                        if(!$country){
                            return [] ;
                        } else {
                            return State::whereCountryId($country)
                                ->pluck("name","id");
                        } 
                    })
                    ->reactive(),
                TextInput::make("name")
            ]);
    }
}
