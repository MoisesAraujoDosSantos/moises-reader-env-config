<?php


use Moises\ReaderEnvConfig\Reader as ReaderEnvConfigReader;

require_once __DIR__ . '/../vendor/autoload.php';


$reader = new ReaderEnvConfigReader();

print($reader->read(__DIR__ . '/../.env_false'));