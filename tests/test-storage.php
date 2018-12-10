<?php

namespace devtoolboxuk\storage;

use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }


    public function testRunTimeException()
    {

        if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
            $this->runtimeExceptionOnGetNonExistantAdapter();
            $this->runtimeExceptionOnGetNoAdapter();
        } else {
            $this->markTestSkipped('PHP version not supported');
        }
    }


    private function runtimeExceptionOnGetNonExistantAdapter()
    {

        $dbOptions = $this->getOptions();
        $dbOptions['database']['adapter'] = 'testAdapter';
        $storage = new StorageManager();
        $this->expectException(\RuntimeException::class);
        $storage->getAdapter();
    }


    private function getOptions()
    {
        $options = [
            'database' => [
                'adapter' => 'mysql'
            ],
        ];
        return $options;
    }

    private function runtimeExceptionOnGetNoAdapter()
    {
        $storage = new StorageManager();
        $this->expectException(\RuntimeException::class);
        $storage->getAdapter();
    }


}
