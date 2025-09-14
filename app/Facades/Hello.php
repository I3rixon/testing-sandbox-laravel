<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Hello extends Facade
{
    protected static  function getFacadeAccessor(): string
    {
        return 'hello';
    }
}
