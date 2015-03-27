<?php
namespace MyBudget\Tests;

class PhpunitTest extends \PHPUnit_Framework_TestCase
{
    public function testPhpunitIsPhpunit() {
        $string = 'phpunit';
        $this->assertEquals($string, 'phpunit');
    }
}