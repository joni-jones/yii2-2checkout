<?php

namespace yii\twocheckout\tests;

use Yii;
use yii\twocheckout\TwoCheckout;

class TwoCheckoutTest extends \PHPUnit_Framework_TestCase
{
    /** @var \yii\twocheckout\TwoCheckout */
    public $twoCheckout;

    public function setUp()
    {
        $this->twoCheckout = new TwoCheckout();
    }

    public function testInitialization()
    {
        $this->assertAttributeNotEmpty('privateKey', $this->twoCheckout, 'Private Key should not be empty');
        $this->assertAttributeNotEmpty('sellerId', $this->twoCheckout, 'Seller Id should not be empty');
        $this->assertAttributeNotEmpty('secretWord', $this->twoCheckout, 'Secret Word should not be empty');
    }
}
 