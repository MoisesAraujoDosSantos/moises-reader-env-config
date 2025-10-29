<?php
namespace Moises\ReaderEnvConfig;
class Reader {
    public function read($filePath) {
        if (!file_exists($filePath)) {
            throw new \Exception("File not found: " . $filePath);
        }
        return file_get_contents($filePath);
    }
}