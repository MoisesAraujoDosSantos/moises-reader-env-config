<?php

namespace Moises\EnvConfig\exceptions;

class InvalidFileFormatException extends ConfigException{
    protected $severity = 'ERROR';
    
    public function __construct($message){
        parent::__construct($message);
    }
   
}

