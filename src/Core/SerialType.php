<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Core;

use Illuminate\Support\Str;

class SerialType
{
	protected function alphanumeric()
    {
    	$sn = null;
        for($i=1;$i<=config('irfa.app_license_server.segment');$i++)
        {
            $sn .= Str::random(config('irfa.app_license_server.length'))."-";
        }
        $sn = strtoupper($sn);
        return rtrim($sn, '-');
    }

}