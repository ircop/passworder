<?php

namespace Ircop\Passworder\Facade;
#use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: wingman
 * Date: 12.11.2015
 * Time: 16:36
 */

class Passworder extends Facade
{
    protected static function getFacadeAccessor() { return 'passworder'; }
}
