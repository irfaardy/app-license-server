<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Facades;

use Illuminate\Support\Facades\Facade;

class AppLicenseServer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Irfa\AppLicenseServer\Func\License::class;
    }
}
