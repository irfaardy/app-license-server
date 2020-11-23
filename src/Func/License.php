<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Func;

use Irfa\AppLicenseServer\Core\SerialManager;

class License extends SerialManager
{
    private $serial;
    public function register($params,$expired)
    {
        return $this->createLicense($params,$expired);
    }

    public function serial($serial)
    {
        $this->serial = $serial;
        return $this;
    }

    public function disable()
    {
        //Coming soon
    }

    public function enable()
    {
        //Coming soon
    }

    public function renew($date)
    {
        //Coming soon
    }

    public function check()
    {
        if($this->exists($this->serial))
        {
            if($this->expired($this->serial))
            {
                return (object)['active' => false,'message' => "Serial Number is Expired"];
            }

             return (object)['active' => true,'message' => "Serial Number is valid"];
        } else{
            return (object)['active' => false,'message' => "Serial Number invalid"];
        }
    }
}
