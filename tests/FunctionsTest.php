<?php

use PHPUnit\Framework\TestCase;
use Core\Functions;

class FunctionsTest extends TestCase
{
    public function test_basePath()
    {
        $result = Functions::basePath("test");

        $this->assertEquals("/opt/lampp/htdocs/Application/onlineStore/PHP_MVC/Core/../test",$result);
        $this->assertStringContainsString("PHP_MVC",$result);
        $this->assertStringEndsWith("test",$result);
    }
}