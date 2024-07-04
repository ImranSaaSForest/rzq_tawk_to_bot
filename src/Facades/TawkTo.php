<?php

namespace RZQ\TawkTo\Facades;

use Illuminate\Support\Facades\Facade;

class TawkTo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tawkto';
    }
}
