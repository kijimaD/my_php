<?php

use PHPUnit\Framework\TestCase;
use app\src\Sample;

class SampleTest extends TestCase
{
    public function testHello()
    {
        $sample = new Sample();

        $result = $sample->hello();

        $this->assertEquals("Hello", $result);
    }
}

class EntreeTest extends TestCase
{
    public function testHasIngredient()
    {
        $soup = new Entree('Chiken Soup', array('chiken', 'water'));
    }
}
