
# 🚀Simple Laravel Encrypt Upload File
[![GitHub license](https://img.shields.io/github/license/irfaardy/encrypt-file-laravel?style=flat-square)](https://github.com/irfaardy/encrypt-file-laravel/blob/master/LICENSE) [![Support me](https://img.shields.io/badge/Support-Buy%20me%20a%20coffee-yellow.svg?style=flat-square)](https://www.buymeacoffee.com/OBaAofN)

<p>The Simple Laravel Encrypt Upload File uses the default encryption of Laravel which is implemented in upload file.<p>
<h3>🛠️ Installation with Composer </h3>

    composer require irfa/encrypt-file-laravel

>You can get Composer [ here]( https://getcomposer.org/download/)

***


<h2>🛠️ Laravel Setup </h2>

<h3>Add to config/app.php</h3>

    'providers' => [
        ....
        Irfa\FileSafe\FileSafeServiceProvider::class,
         ];



<h3>Add to config/app.php</h3>

    'aliases' => [
             ....
      'FileSafe' => Irfa\FileSafe\Facades\FileSafe::class,
    
        ],

  <h2>Publish Vendor</h2>


    php artisan vendor:publish --tag=file-safe

<h2>Config File</h2>

    config/irfa/filesafe.php

<h2>Example store file</h2>


    <?php
    
    namespace App\Http\Controllers;
    
    use Filesafe;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    
    class FileController extends Controller
    {
       
        public function upload_file(Request $request)
        {
           $file = $request->file('file');
           FileSafe::store($file);
    //This is to encrypt the file before it is uploaded to the server.

        }
    }

<h2>Example download file</h2>


    <?php
    
    namespace App\Http\Controllers;
    
    use FileSafe;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    
    class FileController extends Controller
    {
       
        public function upload_file(Request $request)
        {
           $file = 'encrypted_file.doc';
           return FileSafe::download($file);
    //This is to decrypt files to be downloaded.
        }
    }

