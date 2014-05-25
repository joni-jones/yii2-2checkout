<?php

namespace yii\twocheckout\tests;

use Yii;
use yii\twocheckout\TwoCheckout;

class TwoCheckoutTest extends \PHPUnit_Framework_TestCase
{
    /** @var \yii\twocheckout\TwoCheckout $twoCheckout*/
    public $twoCheckout;

    public function setUp()
    {
        $this->twoCheckout = Yii::createObject([
            'class' => '\yii\twocheckout\TwoCheckout',
            'privateKey' => 'nti123mt',
            'sellerId' => '112233',
            'secretWord' => 'tango',
        ]);
    }

    public function testInitialization()
    {
        $this->assertAttributeEquals('nti123mt', 'privateKey', $this->twoCheckout);
        $this->assertAttributeEquals('112233', 'sellerId', $this->twoCheckout);
        $this->assertAttributeEquals('tango', 'secretWord', $this->twoCheckout);
    }
}
 