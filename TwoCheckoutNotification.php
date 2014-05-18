<?php

namespace yii\twocheckout;

/**
 * Class TwoCheckoutNotification
 *
 * @package yii\twocheckout
 * @method array|string auth(array $insMessage = [], $secretWord) see Twocheckout_Notification::check() for more info
 */
class TwoCheckoutNotification extends TwoCheckoutAdapter
{
    /**
     * @var string library class name
     */
    protected $instanceClassName = 'Twocheckout_Notification';
}
 