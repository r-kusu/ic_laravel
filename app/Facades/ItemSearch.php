<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ItemSearch extends Facade
{
    protected static function getFacadeAccessor() {
        return 'itemserch';
    }
}