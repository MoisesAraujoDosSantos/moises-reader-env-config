<?php

namespace Moises\EnvConfig;

use Moises\EnvConfig\exceptions\InvalidFormatException;
use Moises\EnvConfig\exceptions\NotFoundException;

class ConfigManager {
    protected static array $enviroments;
    private static bool $isConfigured = false;
    public static function setup(string $filePath) 
    {
        if (self::$isConfigured) return;

        $extension = Verify::verifyExtension($filePath);
        if ($extension === "php") {
            $config = include $filePath;
           
            self::verifyArray($config);
            self::config($config);
            self::$isConfigured = true;
            return;
        }
        if ($extension === "env") {
            $array =  Reader::readEnv($filePath);
            self::config($array);
            self::$isConfigured = true;
            return;
        }
    }

    public static function config(array $data)
    {
        self::$enviroments = $data;
        return;
    }

    public static function verifyArray(array $array)
    {
         if(!is_array($array))
                throw new InvalidFormatException("The PHP config file must return an array.");
         
         foreach($array as $key => $value){
            if(!is_string($key)){
                throw new InvalidFormatException("The PHP config file must return an array with string keys.");
            }

            

            if(is_string($value) &&  !preg_match('/^[a-zA-Z0-9 _@.!=\-]+$/',$value)){
                throw new InvalidFormatException("The array content contains invalid characters. Only alphanumeric characters, spaces, hyphens, and underscores are allowed.");
            }

            if (!is_string($value) && !is_int($value) && !is_float($value) && !is_bool($value)) {
                throw new InvalidFormatException("The PHP config file must return an array with string, int, float, or bool values.");
            }
         }
         return true;
    }

    public static function returnEnviroment(string $enviroment)
    {
        
        if(!isset(self::$enviroments[$enviroment])){
            throw new NotFoundException("Enviroment not found: " . $enviroment);
        }
        return self::$enviroments[$enviroment];
    }
}