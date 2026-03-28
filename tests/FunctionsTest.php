<?php

use Core\Database;
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

    // public function test_controller()
    // {
    //     $result = Functions::controller("about");

    //     $this->assertEquals("HTTP/controllers/about.php",$result);
    //     $this->assertStringContainsString("HTTP/controllers",$result);
    //     $this->assertStringEndsWith(".php",$result);
    // }

}