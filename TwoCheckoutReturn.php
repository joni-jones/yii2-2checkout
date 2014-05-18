<?php

namespace yii\twocheckout;

/**
 * Class TwoCheckoutReturn
 *
 * @package yii\twocheckout
 * @method array|string check(array $params = [], $secretWord) see Twocheckout_Return::check() for more info
 */
class TwoCheckoutReturn extends TwoCheckoutAdapter
{
    /**
     * @var string library class name
     */
    protected $instanceClassName = 'Twocheckout_Return';
}
 