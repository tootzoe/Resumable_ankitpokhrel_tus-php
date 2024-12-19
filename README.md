# Resumable_ankitpokhrel_tus-php
Record how to setup Resumable_ankitpokhrel_tus-php for laravel....


orignal from : https://github.com/ankitpokhrel/tus-php/wiki/Laravel-&-Lumen-Integration

1/ create a laravel project

2/ add tus-php : composer require ankitpokhrel/tus-php

3/ add service provider: 
   php artisan make:provider TusServiceProvider  
   
4/ add route to (projRoot)/routes/web.php : 
   Route::any('/tus/{any?}', function () {
    return app('tus-server')->serve();
  })->where('any', '.*');
  
5/ downgrade guzzlehttp/guzzle, till now (2024-12-20) , tus-php dosen't work properly with high verions guzzlehttp/guzzle,
   so i downgrade it to ver-7.2
   add "guzzlehttp/guzzle": "^7.2"  to composer.json <require> section
   
6/ run:  composer upgrade

7/ link storage:  php artisan storage:link

8/ make folder named "uploads" inside web public folder

9/ if we don't use CSRF validation, we can disable it, 
   go to : (projRoot)/vendor/laravel/framework/src/Illuminate/Foundation/Http/Middleware/VerifyCsrfToken.php
   set  protected $except = ['tus/*',];
   
10/ we can test tus-php service now....

11/ if test using attached sample clients(basic, partial, uppy), check the target host URL is the same as current running server's URL

12/ i have successsfuly test this tus-php service on macos and win11.
  







