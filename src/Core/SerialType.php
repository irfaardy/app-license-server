<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Core;

use Illuminate\Support\Str;
use Irfa\SerialNumber\Func\SerialNumber as SN;

class SerialType
{
    private $alphanumeric = "0123456789ABCDEFGHIJKLMNPQRSTUWXYZ";
    private $alphabhet = "ABCDEFGHIJKLMNPQRSTUWXYZ";
    private $numeric = "0123456789";
    private $seperator = "-";

    private function sn()
    {
        $sn = new SN();

        return $sn;
    }
	protected function alphanumeric()
    {
    	return $this->sn()->setConfig([   
                                'length'            => config('irfa.app_license_server.length'),
                                'segment'           => config('irfa.app_license_server.segment'),
                                'seperator'         => $this->seperator,
                                'charset'           => $this->alphanumeric,
                            ])->generate();
    }

    protected function numeric()
    {
        return $this->sn()->setConfig([   
                                'length'            => config('irfa.app_license_server.length'),
                                'segment'           => config('irfa.app_license_server.segment'),
                                'seperator'         => $this->seperator,
                                'charset'           => $this->numeric,
                            ])->generate();
    }
    
    protected function alphabet()
    {
        return $this->sn()->setConfig([   
                                'length'            => config('irfa.app_license_server.length'),
                                'segment'           => config('irfa.app_license_server.segment'),
                                'seperator'         => $this->seperator,
                                'charset'           => $this->alphabhet,
                            ])->generate();
    }

}