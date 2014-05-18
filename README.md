2Checkout PHP library for Yii 2
=====================================

Extension provides access for [2Checkout library](https://github.com/2Checkout/2checkout-php) methods from Yii2 framework.

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
            'class' => 'yii\twocheckout\Twocheckout',
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



Full documentation you can find on [2Checkout](https://www.2checkout.com/documentation/libraries/php) site.