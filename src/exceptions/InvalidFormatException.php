<?php

namespace Moises\EnvConfig\exceptions;

class InvalidFormatException extends ConfigException{

    protected $severity = 'ERROR';

    public function __construct($message){
        parent::__construct($message);
    }
}