<?php

namespace Moises\EnvConfig\exceptions;

use Exception;

 class ConfigException extends Exception{
    protected $severity = 'WARNING';

     public function message()
    {
        
        $array =  [
            'code' => $this->getCode(),
            'severity' => $this->severity,
            'message' => $this->getMessage(),
            'file' => $this->getFile(),
            'line' => $this->getLine()
        ];
        return json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}