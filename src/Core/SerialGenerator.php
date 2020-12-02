<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Core;

use Illuminate\Support\Str;

class SerialGenerator extends SerialType
{
	protected function generateSerial()
    {
        return $this->alphanumeric();
    }

}