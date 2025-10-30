<?php

namespace Moises\EnvConfig;

use Moises\EnvConfig\exceptions\InvalidFileFormatException;

class Verify {
    public static function verifyExtension(string $pathName)
    {
        $filename = basename($pathName);
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if ($ext === "php")
            return "php";
        if ($filename === 'env')
            return "env";
        throw new InvalidFileFormatException("Unsupported file extension: " . $ext);
    }
}