<?php
namespace yii\twocheckout\tests;

use yii\twocheckout\TwoCheckoutCharge;

class TwoCheckoutChargeTest extends \PHPUnit_Framework_TestCase
{
    /** @var \yii\twocheckout\TwoCheckoutCharge $intance */
    public $instance = null;
    
    public function setUp()
    {
        $this->instance = new TwoCheckoutCharge();
    }
    
    public function testMethods()
    {
        $methodList = [
            'form'
        ];
        foreach ($methodList as $method) {
            $this->assertEquals(true, method_exists($this->instance, $method));
        }
    }
}
