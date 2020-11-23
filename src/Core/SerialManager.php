<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Core;

use Illuminate\Support\Str;
use Irfa\AppLicenseServer\Models\LicenseSerial;

class SerialManager
{
    private $generated_serial;
    private $name;
    private $domain;
    private $phone_number;
    private $address;
    private $serial;
    private $expired;
    private $status;

    private function generateSerial()
    {
        $sn = null;
        for($i=1;$i<=config('irfa.app_license_server.segment');$i++)
        {
            $sn .= Str::random(config('irfa.app_license_server.length'))."-";
        }
        $sn = strtoupper($sn);
        return rtrim($sn, '-');
    }

    protected function expired($sn)
    {
        $exp = LicenseSerial::where('serial',$sn)->first();
        if(empty($exp))
        {
            return true;
        } else{
            if($exp->expired > strtotime(date('Y-m-d')))
            {
                return false;
            }

            return true;
        }
    }

    protected function exists($sn)
    {
        $exp = LicenseSerial::where('serial',$sn)->count();
        if(empty($exp))
        {
            return false;
        } 
            return true;
    }

    protected function createLicense($params, $expired)
    {
        $sn =  $this->generateSerial();
        $expired = strtotime($expired);
        if($this->checkAvaibility($sn))
        {
            $this->name = $params['name'];
            $this->domain = $params['domain'];
            $this->phone_number = $params['phone_number'];
            $this->address = $params['address'];
            $this->serial =$sn;
            $this->expired = $expired;

            return $this->insertToTable();
        } else{
            return $this->createLicense($params);
        }
    }
    private function checkAvaibility($sn)
    {
        if(LicenseSerial::where('serial',$sn)->count() == 0)
        {
            return true;
        } 
            return true;
    }
    private function insertToTable()
    {
        return LicenseSerial::create(['name'=>$this->name,'domain'=>$this->domain,'phone_number'=>$this->phone_number,'address'=>$this->address,'serial'=>$this->serial,'expired'=>$this->expired]);
    }
}
