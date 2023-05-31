<?php

namespace CerenOzkurt\ResponseTrait\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ResponseBuilder.
 */
class ResponseTrait extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'response_trait';
    }
}