Laravel 5  Ali-SMS
==================

## 基于laravel5开发的新版阿里短信服务
php >=5.5.0
会自动加载 ```alibabacloud/client```阿里最新版短信轮子

## Installation

[PHP](https://php.net) 5.5+ , and [Composer](https://getcomposer.org) are required.

To get the latest version of Laravel Exceptions, simply add the following line to the require block of your `composer.json` file:

```
"arthuryinzhen/laravel-ali-sms": "dev-master"
```

You'll then need to run `composer install` or `composer update` to download it and have the autoloader updated.

then run 

* `php artisan vendor:publish`



## 配置

 若以上安装没问题,自定义项目配置文件会在 config/AliSMS.php  (会自动生成)

 .env 需要配置4个选项
 
 ```
 ALISMS_ACCESS_ID
 ALISMS_ACCESS_SECRET
 ALISMS_SING_NAME
 ALISMS_TEMPLATE_CODE
 ```

## Usage


 直接在文件中调用单例模式```app('alisms')->send($phone, $code)```即可
