2Checkout PHP library for Yii 2
=====================================

Extension provides access for [2Checkout library](https://github.com/2Checkout/2checkout-php) methods from Yii2 framework.

[![Latest Stable Version](https://poser.pugx.org/joni-jones/yii2-2checkout/v/stable)](https://packagist.org/packages/joni-jones/yii2-2checkout)
[![Total Downloads](https://poser.pugx.org/joni-jones/yii2-2checkout/downloads)](https://packagist.org/packages/joni-jones/yii2-2checkout)
[![License](https://poser.pugx.org/joni-jones/yii2-2checkout/license)](https://packagist.org/packages/joni-jones/yii2-2checkout)

How to install?
---------------

Get it via [composer](http://getcomposer.org/) by adding the package to your `composer.json`:

```json
{
  "require": {
    "joni-jones/yii2-2checkout": "*"
  }
}
```

or run

```
php composer.phar require --prefer-dist joni-jones/yii2-2checkout "*"
```

Usage
-----

Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'components' => [
        'twocheckout' => [
            'class' => 'yii\twocheckout\TwoCheckout',
            'privateKey' => '',
            'sellerId' => '',
            'secretWord' => '', //by default is 'tango'
            'username' => '', //required to Admin API call
            'password' => '', //required to Admin API call
            'sandbox' => true, //by default false,
        ]
    ],
    // ...
];
```

The `Charge` class usage example (equal to `Twocheckout_Charge::form()`):

```php
$product['currency_code'] = 'USD';
$product['mode'] = '2CO';
$product['li_0_price'] = '0.01';
$product['merchant_order_id'] = '1122312';
$product['li_0_name'] = 'Credit';
$product['li_0_quantity'] = '1';
$product['li_0_type'] = 'product';
$product['li_0_tangible'] = 'N';
$product['li_0_product_id'] = '43242342';
$product['sid'] = Yii::$app->twocheckout->sellerId;
$product['demo'] = Yii::$app->twocheckout->demo;
$product['key'] = md5($product['merchant_order_id'].$product['li_0_product_id']);
Yii::$app->twocheckout->charge->form($product);
```

Full documentation you can find on [2Checkout](https://www.2checkout.com/documentation/libraries/php) site.
