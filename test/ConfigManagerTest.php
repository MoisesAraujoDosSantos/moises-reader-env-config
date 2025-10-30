<?php

namespace Moises\EnvConfig;

use PHPUnit\Framework\TestCase;

class ConfigManagerTest extends TestCase{

    public function testReturnEnvironmentWhenValueIsFalse()
    {
        ConfigManager::setup(__DIR__ . '/../example.php');
        $result = ConfigManager::returnEnviroment('a');
        $this->assertFalse($result);
    }
    public function testReturnEnvironmentWhenValueIsTrue()
    {
        ConfigManager::setup(__DIR__ . '/../example.php');
        $result = ConfigManager::returnEnviroment('b');
        $this->assertTrue($result);
    }

}