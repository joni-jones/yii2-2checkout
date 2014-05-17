<?php

namespace yii\twocheckout;

abstract class TwoCheckoutAdapter
{
    /**
     * Must be overridden in children classes
     */
    protected $instanceClassName = null;

    /**
     * Magic call method
     *
     * @access public
     * @param $name
     * @param $arguments
     * @throws TwoCheckoutException
     */
    public function __call($name, $arguments)
    {
        if (!$this->instanceClassName || !class_exists($this->instanceClassName)) {
            throw new TwoCheckoutException('Twocheckout library class name should not be empty or not exists');
        }
        if (!method_exists($this->instanceClassName, $name)) {
            throw new TwoCheckoutException("Method {$name} is not supported");
        }
        call_user_func_array([$this->instanceClassName, $name], $arguments);
    }
}

class TwoCheckoutException extends \Twocheckout_Error{}
 