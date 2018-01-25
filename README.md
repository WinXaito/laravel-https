*Si vous souhaitez lire ce fichier README en français, [cliquez ici](https://github.com/WinXaito/laravel-https/blob/master/README_fr.md).*

# Laravel HTTPS redirection
This package aims to redirect your HTTP requests to HTTPS very simply.

## Installation

*NB: This package has not been tested below Laravel 5.5*


First, use the function below:

```
composer require winxaito/laravel-https
```

If you don't use auto-discovery, add the ServiceProvider to the providers 
array in `config/app.php`

```php
WinXaito\LaravelHttpsRedirect\LaravelHttpsServiceProvider::class,
```

If you want to work with the configurations without going through an environment 
file, run the following command and then edit the `config/https-redirection.php` 
file

```php
php artisan vendor:publish --provider="WinXaito\LaravelHttpsRedirect\LaravelHttpsServiceProvider"
```

## How to use it ?

This package works with environment variables in order of priority.  
List of constants in order of priority:

- `HTTPS_FORCE`: If this value is true, then in all cases the requests will be 
redirected to *HTTPS*, otherwise we go to the following constant:
- `HTTPS_PROHIBIT`: If this constant is true, the queries will not be redirected, 
if it is false, then we go to the following constant:
- `APP_ENV`: If this constant is *production*, then we redirect to *HTTPS*, 
otherwise we go to the following constant:
- `APP_DEBUG`: If the application is not in debug mode, it is redirected to 
*HTTPS*, unless *HTTPS_PROHIBIT* is true. If the application is in debug mode 
then the address will not be redirected.


By default if no environment variable is defined we have the following values:

- `HTTPS_FORCE = false`
- `HTTPS_PROHIBIT = false`
- `APP_ENV = production`
- `APP_DEBUG = false`

Therefore by default the redirection is enabled.

## License

The license is GNU GPL3, therefore if you use this you must respect the 
indications of the license. For proprietary software that would like to 
use this library without making their source code available, please contact me.
