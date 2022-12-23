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
}
