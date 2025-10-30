<?php
namespace Moises\EnvConfig;

use Moises\EnvConfig\exceptions\FileNotFoundException;

class Reader {
    public static function readEnv($filePath) {
        if (!file_exists($filePath)) {
            throw new FileNotFoundException("File not found: " . $filePath);
        }

        $content = file_get_contents($filePath);
        $lines = explode("\n", $content);
        $envVars = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line && !str_starts_with($line, "#")) {
                // desconstruindo a linha em chave e valor
                list($key, $value) = explode("=", $line, 2);
                $envVars[trim($key)] = trim($value);
            }
        }
        return $envVars;
    }
}
