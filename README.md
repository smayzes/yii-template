yii-template
============

Custom Yii template for personal development.

## Setup

1) File: index.php

Set the Yii framework path with the location of where you installed the [Yii framework](http://www.yiiframework.com).

```php
require_once('<path-to-yii>/yii.php');
```

Set the Server IP Address for the dev server to load the dev config where applicable.

```php
case '<dev-server-ip>' :
```

2) File: protected/config/dev.php

Set your IP for the Rollbar IP Filters

```php
'ipFilters'=>array('127.0.0.1', '<your-ip>')
```

Set up your [Rollbar](http://www.rollbar.com) Access Token

```php
'AccessToken'=>'<Rollbar-AccessToken>',
````

Set up database connection string

```php
'db'=>array(
        'connectionString'   => 'mysql:host=localhost;dbname=',
		'emulatePrepare'     => true,
		'username'           => '',
		'password'           => '',
		'charset'            => 'utf8',
        'schemaCachingDuration' => 3600000, // One hour
        'enableProfiling'       => true,
        'enableParamLogging'    => true,
    ),
```

3) File: protected/config/main.php

Set up your GiiModule IP Filters and password

```php
'password'=>'<gii-password>',
'ipFilters'=>array('<your-ip>'),
```

Set up database connection string

```php
'db'=>array(
        'connectionString'   => 'mysql:host=localhost;dbname=',
		'emulatePrepare'     => true,
		'username'           => '',
		'password'           => '',
		'charset'            => 'utf8',
        'schemaCachingDuration' => 3600000, // One hour
        'enableProfiling'       => true,
        'enableParamLogging'    => true,
    ),
```

Set up your params for email address:

```php
'adminEmail'=>'<your-email>',
```

If using console(yiic) change the Yii Framework path location

```php
$yiic=dirname(__FILE__).'<path-to-yii>/yii.php';
```