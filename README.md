Task Evolution
==============
Help developing with task evolution

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist gomonkey/yii2-task-evolution "*"
```

or add

```
"gomonkey/yii2-task-evolution": "*"
```

to the require section of your `composer.json` file.


Update database schema
----------------------

You need to do is updating your database schema by applying the migrations. Make sure that you have properly configured db application component and run the following command:

` $ php yii migrate/up --migrationPath=@vendor/gomonkey/yii2-task-evolution/migration `

Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php 
echo Task::widget([
	'ipAddress' => ['::1', '89.176.41.130', '89.176.41.120'],
	'users' => false,
	'active' => true,
]);; 
?>```


php yii migrate/up --migrationPath=@vendor/gomonkey/yii2-task-evolution/migration
