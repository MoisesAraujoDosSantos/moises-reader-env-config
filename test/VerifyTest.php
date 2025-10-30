<?php

namespace Moises\EnvConfig\Tests;

use Moises\EnvConfig\Verify;

class VerifyTest extends \PHPUnit\Framework\TestCase
{
    public function testVerifyExtension()
    {
        $this->assertEquals('php',Verify::verifyExtension('config.php'));
        $this->assertEquals('env',Verify::verifyExtension('.env'));
    }
    
    public function testVerifyExtensionException()
    {
        $this->expectException(\Exception::class);
        Verify::verifyExtension('config.txt');
    }
}