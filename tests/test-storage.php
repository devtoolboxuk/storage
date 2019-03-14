<?php

namespace devtoolboxuk\storage;

use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }


    private function getOptions()
    {
        $options = [
            'adapter' => 'mysql',
            'config' => [
                'driver' => 'mysqli',
                'host' => '',
                'dbname' => '',
                'user' => '',
                'password' => '',
                'port' => '3306',
                'charset' => 'utf8'
            ]
        ];
        return $options;
    }

    public function testRunTimeException()
    {
        $this->runtimeExceptionOnGetNonExistentAdapter();
        $this->runtimeExceptionOnGetNoAdapter();
    }

    private function runtimeExceptionOnGetNonExistentAdapter()
    {

        $dbOptions = $this->getOptions();
        $dbOptions['database']['adapter'] = 'testAdapter';
        $storage = new StorageManager();

        $this->expectException(\RuntimeException::class);
        $storage->getAdapter();
    }

    private function runtimeExceptionOnGetNoAdapter()
    {
        $storage = new StorageManager();
        $this->expectException(\RuntimeException::class);
        $storage->getAdapter();
    }


}
