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

    /**
     * @covers \yii\twocheckout\TwoCheckout::init()
     */
    public function testInitialization()
    {
        $this->assertAttributeEquals('nti123mt', 'privateKey', $this->twoCheckout);
        $this->assertAttributeEquals('112233', 'sellerId', $this->twoCheckout);
        $this->assertAttributeEquals('tango', 'secretWord', $this->twoCheckout);
    }

    /**
     * @covers \yii\twocheckout\TwoCheckout::getCharge()
     */
    public function testChargeInstance()
    {
        $this->assertInstanceOf('\yii\twocheckout\TwoCheckoutCharge', $this->twoCheckout->charge);
    }

    /**
     * @covers \yii\twocheckout\TwoCheckout::getMessage()
     */
    public function testMessageInstance()
    {
        $this->assertInstanceOf('\yii\twocheckout\TwoCheckoutMessage', $this->twoCheckout->message);
    }

    /**
     * @covers \yii\twocheckout\TwoCheckout::getNotification()
     */
    public function testNotificationInstance()
    {
        $this->assertInstanceOf('\yii\twocheckout\TwoCheckoutNotification', $this->twoCheckout->notification);
    }

    /**
     * @covers \yii\twocheckout\TwoCheckout::getReturn()
     */
    public function testReturnInstance()
    {
        $this->assertInstanceOf('\yii\twocheckout\TwoCheckoutReturn', $this->twoCheckout->return);
    }
}
 