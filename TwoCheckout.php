<?php

namespace yii\twocheckout;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Object;
use yii\di\ServiceLocator;

class TwoCheckout extends Object
{
    public $privateKey = '';
    public $sellerId = '';

    public $username = '';
    public $password = '';

    public $verifySSL = false;

    public $sandbox = false;
    public $format = 'json';

    /** @var \yii\di\ServiceLocator $locator */
    private $locator = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->locator = new ServiceLocator();

        if ($this->username && $this->password) {
            Twocheckout::username($this->username);
            Twocheckout::password($this->password);
        }

        if (!$this->privateKey) {
            throw new InvalidConfigException('Invalid private key was specified');
        }
        Twocheckout::privateKey($this->privateKey);
        if (!$this->sellerId) {
            throw new InvalidConfigException('Invalid seller id was specified');
        }
        Twocheckout::sellerId($this->sellerId);
        TwoCheckout::verifySSL($this->verifySSL);
        Twocheckout::sandbox($this->sandbox);
        Twocheckout::format($this->format);
    }

    /**
     * Get twocheckout charge class instance
     *
     * @access public
     * @return \yii\twocheckout\TwoCheckoutCharge
     */
    public function getCharge()
    {
        if (!$this->locator->has('change')) {
            $this->locator->set('charge', '\TwoCheckoutCharge');
        }
        return $this->locator->get('charge');
    }
}
 