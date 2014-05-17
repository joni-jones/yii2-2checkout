<?php

namespace yii\twocheckout;

use yii\base\InvalidConfigException;
use yii\base\Object;
use yii\di\ServiceLocator;

/**
 * Class TwoCheckout
 * @package yii\twocheckout
 */
class TwoCheckout extends Object
{
    /** @var string API private key */
    public $privateKey = '';
    /** @var string seller id */
    public $sellerId = '';

    /** @var string Admin API username */
    public $username = '';
    /** @var string Admin API password */
    public $password = '';

    /** @var bool check SSL */
    public $verifySSL = false;

    /** @var bool API requests mode */
    public $sandbox = false;
    /** @var string API response format */
    public $format = 'array';

    /** @var \yii\di\ServiceLocator $locator */
    private $locator = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->locator = new ServiceLocator();

        if ($this->username && $this->password) {
            \Twocheckout::username($this->username);
            \Twocheckout::password($this->password);
        }

        if (!$this->privateKey) {
            throw new InvalidConfigException('Invalid private key was specified');
        }
        \Twocheckout::privateKey($this->privateKey);
        if (!$this->sellerId) {
            throw new InvalidConfigException('Invalid seller id was specified');
        }
        \Twocheckout::sellerId($this->sellerId);
        \TwoCheckout::verifySSL($this->verifySSL);
        \Twocheckout::sandbox($this->sandbox);
        \Twocheckout::format($this->format);
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
            $this->locator->set('charge', '\yii\twocheckout\TwoCheckoutCharge');
        }
        return $this->locator->get('charge');
    }
}
 