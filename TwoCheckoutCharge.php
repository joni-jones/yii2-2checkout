<?php

namespace yii\twocheckout;

/**
 * Class TwoCheckoutCharge
 *
 * @package yii\twocheckout
 * @method void form(array $params, string $type = 'Checkout') see Twocheckout_Charge::form() for more info
 * @method void direct(array $params, string $type = 'Checkout') see Twocheckout_Charge::direct() for more info
 * @method string link(array $params) see Twocheckout_Charge::link() for more info
 * @method void redirect(array $params) see Twocheckout_Charge::redirect() for more info
 * @method array|string auth(array $params) see Twocheckout_Charge::auth() for more info
 */
class TwoCheckoutCharge extends TwoCheckoutAdapter
{
    /**
     * @var string library class name
     */
    protected $instanceClassName = 'Twocheckout_Charge';
}
 