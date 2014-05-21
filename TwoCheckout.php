<?php

namespace yii\twocheckout;

use yii\base\InvalidConfigException;
use yii\base\Object;
use yii\di\ServiceLocator;

/**
 * Class TwoCheckout
 * @package yii\twocheckout
 *
 * @property \yii\twocheckout\TwoCheckoutCharge $charge
 * @property \yii\twocheckout\TwoCheckoutMessage $message
 * @property \yii\twocheckout\TwoCheckoutNotification $notification
 * @property \yii\twocheckout\TwoCheckoutReturn $return
 */
class TwoCheckout extends Object
{
    /** @var string API private key */
    public $privateKey = '';
    /** @var string seller id */
    public $sellerId = '';
    /** @var string used to check payment requests */
    public $secretWord = '';
    /** @var string demo mode config. Available values 'Y' and 'N' */
    public $demo = 'Y';

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
        if (!$this->secretWord) {
            throw new InvalidConfigException('Invalid secret word was specified');
        }
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

    /**
     * Get twocheckout message class instance
     *
     * @access public
     * @return \yii\twocheckout\TwoCheckoutMessage
     */
    public function getMessage()
    {
        if (!$this->locator->has('message')) {
            $this->locator->set('message', '\yii\twocheckout\TwoCheckoutMessage');
        }
        return $this->locator->get('message');
    }

    /**
     * Get twocheckout notification class instance
     *
     * @access public
     * @return \yii\twocheckout\TwoCheckoutNotification
     */
    public function getNotification()
    {
        if (!$this->locator->has('notification')) {
            $this->locator->set('notification', '\yii\twocheckout\TwoCheckoutNotification');
        }
        return $this->locator->get('notification');
    }

    /**
     * Get twocheckout return class instance
     *
     * @access public
     * @return \yii\twocheckout\TwoCheckoutReturn
     */
    public function getReturn()
    {
        if (!$this->locator->has('return')) {
            $this->locator->set('return', '\yii\twocheckout\TwoCheckoutReturn');
        }
        return $this->locator->get('return');
    }

    /**
     * Check payment status
     *
     * @access public
     * @param array $params
     * @return bool
     */
    public function approve(array $params)
    {
        //if demo mode enable order number must be always '1'
        if (!empty($params['demo']) && $params['demo'] == 'Y') {
            $params['order_number'] = 1;
        }
        $passback = $this->return->check($params, $this->secretWord, 'array');
        return ($passback['response_code'] == 'Success');
    }
}
 