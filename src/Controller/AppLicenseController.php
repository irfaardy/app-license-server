<?php

namespace Irfa\AppLicenseServer\Controller;

use Illuminate\Http\Request;
use Irfa\AppLicenseServer\Func\License;
use Irfa\AppLicenseServer\Core\Json;
use App\Http\Controllers\Controller;

class AppLicenseController extends Controller
{
    public function check(Request $request,License $license,Json $json)
    {
    	if(empty($request->serial))
    	{
    		$data['active'] = false;
    		$data['message'] = "Serial number must be provided.";
    		return $json->response(400,'data',$data,[]); 
    	}
    	$res = $license->serial($request->serial)->check();
        if($res->active)
        {
    	   return $json->response(200,'data',$res,[]); 
        } 
           return $json->response(400,'data',$res,[$res->message]); 

    }
}
