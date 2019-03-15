# Devtoolbox/Storage

[![Build Status](https://img.shields.io/travis/devtoolboxuk/storage/master.svg?style=flat-square)](http://travis-ci.org/devtoolboxuk/storage)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/devtoolboxuk/storage/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/devtoolboxuk/storage/?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/devtoolboxuk/storage.svg?style=flat-square)](https://packagist.org/packages/devtoolboxuk/storage)
[![Total Downloads](https://img.shields.io/packagist/dt/devtoolboxuk/storage.svg?style=flat-square)](https://packagist.org/packages/devtoolboxuk/storage)
[![License](https://img.shields.io/packagist/l/devtoolboxuk/storage.svg?style=flat-square)](https://packagist.org/packages/devtoolboxuk/storage)

## Table of Contents

- [Background](#Background)
- [Usage](#Usage)
- [Maintainers](#Maintainers)
- [License](#License)

## Background

Can be used to connect to storage engines such as MySQL

## Usage

Usage of the hashing service

```sh
$ composer require devtoolboxuk/storage
```

Then include Composer's generated vendor/autoload.php to enable autoloading:

```sh
require 'vendor/autoload.php';
```

## MySQL Connection

Basic example of accessing a database

```php
use devtoolboxuk/storage;

$dbOptions = [
    'adapter' => 'mysql',
    'driver' => 'mysqli',
    'host' => '',
    'dbname' => '',
    'user' => '',
    'password' => '',
    'port' => '3306',
    'charset' => 'utf8
];
$storage = new StorageManager($dbOptions);
$conn = $storage->getAdapter()->connection();
$queryBuilder = $conn->createQueryBuilder();

$result = $queryBuilder
    ->select('id', 'name')
    ->from('users')
    ->execute();
print_r($result->fetchAll());
```

## Maintainers
[@DevToolboxUk](https://github.com/DevToolBoxUk).


## License
[MIT](LICENSE) © DevToolboxUK