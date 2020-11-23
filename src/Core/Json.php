<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\AppLicenseServer\Core;

class Json
{
   public  function response($status, $key_data = 'data', $data=null, $errors=null)
    {
        return response()->json([
            'status'    => $status,
            $key_data   => $data,
            'errors'    => $errors
        ],$status);
    }
}
