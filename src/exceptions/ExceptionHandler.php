<?php

namespace Moises\EnvConfig\exceptions;

use Moises\EnvConfig\exceptions\ConfigException;
use Throwable;

class ExceptionHandler {


    public static function register()
    {
        set_exception_handler(function (Throwable $e){
            if ($e instanceof ConfigException) {
                echo $e->message();
                exit;
            }
            throw $e;
        });
    }
} 