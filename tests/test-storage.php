<?php

namespace devtoolboxuk\storage;

use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    public function testRuntimeExceptionOnGetNonExistantAdapter()
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

    public function testRuntimeExceptionOnGetNoAdapter()
    {
        $storage = new StorageManager();
        $this->expectException(\RuntimeException::class);
        $storage->getAdapter();
    }


}
