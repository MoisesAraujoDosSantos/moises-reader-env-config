<?php

namespace Moises\EnvConfig\exceptions;

class NotFoundException extends ConfigException {
    protected $severity = 'ERROR';

    public function __construct($message){
        parent::__construct($message);
    }
}