<?php

namespace yii\twocheckout;

/**
 * Class TwoCheckoutMessage
 *
 * @package yii\twocheckout
 * @method array message($code, $message) see Twocheckout_Message::message() for more info
 */
class TwoCheckoutMessage extends TwoCheckoutAdapter
{
    /**
     * @var string library class name
     */
    protected $instanceClassName = 'Twocheckout_Message';
}
 