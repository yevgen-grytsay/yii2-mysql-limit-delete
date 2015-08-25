Limited rows DB delete query
============================
Allows use LIMIT clause in a DELETE query

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yevgen-grytsay/yii2-mysql-limit-delete "*"
```

or add

```
"yevgen-grytsay/yii2-mysql-limit-delete": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
/** @var \yii\db\Connection $conn */
/** @var \yii\db\mysql\QueryBuilder $qb */
$deleteQb = new \YevgenGrytsay\Yii2DbLimitedDelete\DeleteQuery($conn, $qb);
$command = $deleteQb->delete('table', ['=', 'host', 'packagist.org'], 100);
$command->execute();
```