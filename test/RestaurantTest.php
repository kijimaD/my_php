<?php

use PHPUnit\Framework\TestCase;
use app\src\Restaurant;

class RestaurantTest extends TestCase
{
    public function testWithTaxAndTip()
    {
        $meal = 100;
        $tax = 10;
        $tip = 20;

        $rest = new Restaurant();
        $result = $rest->restaurantCheck($meal, $tax, $tip);
        $this->assertEquals(130, $result);
    }

    public function testWithNoTip()
    {
        $meal = 100;
        $tax = 10;
        $tip = 0;

        $rest = new Restaurant();
        $result = $rest->restaurantCheck($meal, $tax, $tip);
        $this->assertEquals(110, $result);
    }

    public function testTipShouldIncludeTax()
    {
        $meal = 100;
        $tax = 10;
        $tip = 10;

        $rest = new Restaurant();
        $result = $rest->restaurantCheck($meal, $tax, $tip, true);
        $this->assertEquals(121, $result);
    }

    public function testTipShouldNotIncludeTax()
    {
        $meal = 100;
        $tax = 10;
        $tip = 10;

        $rest = new Restaurant();
        $result = $rest->restaurantCheck($meal, $tax, $tip, false);
        $this->assertEquals(120, $result);
    }
}
