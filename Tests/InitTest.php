<?php

class InitTest extends PHPUnit_Framework_TestCase
{
    public function testSucces()
    {
        $this->assertEquals(true, true);
    }

    public function testFailure()
    {
        $this->assertEquals(true, false);
    }
}
