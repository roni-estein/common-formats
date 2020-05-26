<?php

namespace CommonFormats;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

include_once('formats/phone.php');

class ServiceProvider extends BaseServiceProvider {

	public function boot(){

        Validator::extend('phone', 'CommonFormats\\Rules\Phone@passes');
        Validator::extend('province_abbr', 'CommonFormats\\Rules\ProvinceAbbr@passes');
        Validator::extend('postal_code', 'CommonFormats\\Rules\Postalcode@passes');
        
        Blade::directive('checked', function($expression) {
            $items = DirectivesRepository::parseMultipleArgs($expression);
            
            throw_unless($items->count() === 2, new \Exception('Checked Blade directive requires 2 parameters :' . $items->count()));
            return "<?={$items->get(0)} == {$items->get(1)} ? 'checked' : '' ?>";
        });
        
        Blade::directive('selected', function($expression) {
            $items = DirectivesRepository::parseMultipleArgs($expression);
            
            throw_unless($items->count() === 2, new \Exception('Selected Blade directive requires 2 parameters :' . $items->count()));
            return "<?={$items->get(0)} == {$items->get(1)} ? 'selected' : '' ?>";
        });
	}

	/**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

    }

	
}