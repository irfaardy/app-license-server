

# 🚀Lisensi aplikasi untuk server endpoint

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/irfaardy/app-license-server/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/irfaardy/app-license-server/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/irfaardy/app-license-server/badges/build.png?b=master)](https://scrutinizer-ci.com/g/irfaardy/app-license-server/build-status/master) [![Latest Stable Version](https://poser.pugx.org/irfa/app-license-server/v)](//packagist.org/packages/irfa/app-license-server) [![GitHub license](https://img.shields.io/github/license/irfaardy/encrypt-file-laravel?style=flat-square)](https://github.com/irfaardy/encrypt-file-laravel/blob/master/LICENSE)  

[![Support me](https://img.shields.io/badge/Support-Buy%20me%20a%20coffee-yellow.svg?style=flat-square)](https://www.buymeacoffee.com/OBaAofN) [![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/S6S52P7SN)

<p>This plugin functions to create a serial number that will be accessed using plugin <a href="https://github.com/irfaardy/app-license-client">Client side License</a><p>
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


```php
<?php 
	return [ 


                'license_route'		=> '/check/license',


                'route_name'		=> 'check_license',


                'char_type'			=> 'alphanumeric', //Type alphanumeric,numeric,or alphabet

                'length'			=> 4,//default : 4

                'segment'			=> 4,//default : 4

                'striped'			=> true,//default : true



];

    	
    
```


  
<h2>Register New Serial Number License</h2>


```php
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
```

<h2> Check License</h2>

```php
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

<h2>Disabled Serial number</h2>

```php
ALS::serial($request->serial)->disabled();	
```

<h2>Enabled serial number</h2>

```php
ALS::serial($request->serial)->disabled();
```

​	

##How to Contributing?

1. Fork it (<https://github.com/irfaardy/app-license-server/fork>)
2. Commit your changes (`git commit -m 'New Feature'`)
3. Push to the branch (`git push origin your-branch)
4. Create a new Pull Request ` your-branch -> master`

if you found bug or error, please post here https://github.com/irfaardy/app-license-server/issues so that they can be maintained together.



***

## Bagaimana cara berkontribusi?

1. Lakukan fork di (<https://github.com/irfaardy/app-license-server/fork>)
2. Commit perubahan yang anda lakukan (`git commit -m 'Fitur Baru'`)
3. Push ke branch master (`git push origin branch-kamu)
4. Buat Pull Request baru `branch-kamu -> master`

---

## Issue

If you found issues or bug please create new issues here https://github.com/irfaardy/app-license-server/issues/new

Jika anda menemukan bug atau error silahkan posting disini https://github.com/irfaardyapp-license-server/issues agar dapat diperbaiki bersama-sama.

