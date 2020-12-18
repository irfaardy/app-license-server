<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Core;

use Illuminate\Support\Str;
use Irfa\AppLicenseServer\Models\LicenseSerial;

class SerialManager extends SerialGenerator
{
    private $generated_serial;
    private $name;
    private $domain;
    private $phone_number;
    private $address;
    private $serial;
    private $expired;
    private $status;


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

    protected function disabled($sn)
    {
        $disabled = LicenseSerial::where('serial',$sn)->first();
        if($disabled->status==1)
        {
            return true;
        } 
            return false;
        
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
            return false;
    }
    private function insertToTable()
    {
        return LicenseSerial::create(['name'=>$this->name,'domain'=>$this->domain,'phone_number'=>$this->phone_number,'address'=>$this->address,'serial'=>$this->serial,'expired'=>$this->expired]);
    }

    protected function disableSN($sn)
    {
         return LicenseSerial::where('serial',$sn)->update(['status'=>1]);
    }

    protected function enableSN($sn)
    {
         return LicenseSerial::where('serial',$sn)->update(['status'=>0]);
    }

    protected function renewSN($sn,$days)
    {
        if($this->exists($sn))
        {
            $days = strtotime($days);
            $sn = LicenseSerial::where('serial',$sn);
            $sn->update(['expired' =>  $days]);

            $return = $sn->first();
            $return['message'] = "Renew serial number succesfully";
            $return['expired'] = date("Y-m-d, H:m:s",$days);
            return $return;

        }
        $return['message'] = "Renew serial number Failed because serial number not exists.";
         return $return;
    }
}
