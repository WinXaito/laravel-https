<?php

return [
   /*
    |--------------------------------------------------------------------------
    | Force https
    |--------------------------------------------------------------------------
    |
    | When this value is true, https redirection will be occur in all cases
    |
   */

   'https_force' => env('HTTPS_FORCE', false),

    /*
     |--------------------------------------------------------------------------
     | Prohibit https
     |--------------------------------------------------------------------------
     |
     | When this value is true, https redirection will never occur unless
     | "https_force" is true
     |
    */

    'https_prohibit' => env('HTTPS_PROHIBIT', false),

    /*
     |--------------------------------------------------------------------------
     | Application environment
     |--------------------------------------------------------------------------
     |
     | When this value is "production", the redirection will be activated
     | unless "https_prohibit" is true
     |
    */

    'app_env' => env('APP_ENV', 'production'),

    /*
     |--------------------------------------------------------------------------
     | Application debug
     |--------------------------------------------------------------------------
     |
     | When this value is false and "https_prohibit" is also false,
     | redirection takes place
     |
    */

    'app_debug' => env('APP_DEBUG', false),
];