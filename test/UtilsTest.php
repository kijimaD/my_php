<?php

use PHPUnit\Framework\TestCase;
use app\src\Utils;

class UtilsTest extends TestCase
{
    public function testValidateForm_DecimalAgeNotValid()
    {
        $submitted = array('age' => '6.7',
                           'price' => '100',
                           'name' => 'Julia') ;
        $utils = new Utils();
        list($errors, $input) = $utils->validateForm($submitted);

        $this->assertContains('Please enter a valid age.', $errors);
        $this->assertCount(1, $errors);
    }

    public function testValidateForm_DollarSignPriceNotValid()
    {
        $submitted = array('age' => '6',
                           'price' => '$52',
                           'name' => 'Julia');
        $utils = new Utils();
        list($errors, $input) = $utils->ValidateForm($submitted);
        $this->assertContains('Please enter a valid price.', $errors);
        $this->assertCount(1, $errors);
    }

    public function testValidateFormOK()
    {
        $submitted = array('age' => '15',
                           'price' => '39.95',
                           'name' => ' julia ');
        $utils = new Utils();
        list($errors, $input) = $utils->validateForm($submitted);
        $this->assertCount(0, $errors);
        $this->assertSame(15, $input['age']);
        $this->assertSame(39.95, $input['price']);
        $this->assertSame('julia', $input['name']);
    }
}
