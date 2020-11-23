

# 🚀Lisensi aplikasi untuk server endpoint

[![GitHub license](https://img.shields.io/github/license/irfaardy/encrypt-file-laravel?style=flat-square)](https://github.com/irfaardy/encrypt-file-laravel/blob/master/LICENSE)  [![Support me](https://img.shields.io/badge/Support-Buy%20me%20a%20coffee-yellow.svg?style=flat-square)](https://www.buymeacoffee.com/OBaAofN) [![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/S6S52P7SN)

<p>Plugin ini berfungsi untuk membuat serial number yang akan diakses menggunakan plugin <a href="https://github.com/irfaardy/app-license-client">https://github.com/irfaardy/app-license-client</a><p>
<h3>🛠️ Installation with Composer </h3>


    composer require irfa/app-license-server

>You can get Composer [ here]( https://getcomposer.org/download/)

***


<h2>🛠️ Laravel Setup </h2>

<h3>Add to config/app.php</h3>

    'providers' => [
        ....
       Irfa\AppLicenseServer\AppLicenseServerServiceProvider::class,
         ];



<h3>Add to config/app.php</h3>

    'aliases' => [
             ....
      'ALS' => Irfa\AppLicenseServer\Facades\AppLicenseServer::class,
    
        ],

  <h2>Publish Vendor</h2>


    php artisan vendor:publish --tag=app-license-server

<h2>Run Migration</h2>

```
php artisan migrate
```

<h2>Config File</h2>

    config/irfa/app_license_server.php

<h2>Inside Config File</h2>


    <?php<?php 
    	return [ 
    
    		'hashed'			=> false,//Hashed Serial number,
    
    		'caching_license'	=> true,//Generate random alnum for upload filename,
    
    		'license_route'		=> "/check/license",
    
    		'route_name'		=> "check_license",
    
    		'length'			=> 4, //length char per segment
    
    		'segment'			=> 4,
    
    
    
    ];

<h2>Register New Serial Number License</h2>


    <?php
    
    namespace App\Http\Controllers;
    
    use ALS;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    
    class LicenseController extends Controller
    {
       
        public function register(Request $request)
        {
          	return ALS::register(['name'=>"Lorem",
          						'domain'=>"example.com",
          						'phone_number'=>"08123123",
          						'address'=>"Bandung,Indonesia"],now()->addDays(30));	
        }
    }

<h2> Check License</h2>

```
<?php

namespace App\Http\Controllers;

use ALS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenseController extends Controller
{

    public function check(Request $request)
    {
      	return ALS::serial($request->serial)->check();	
    }

}
```

