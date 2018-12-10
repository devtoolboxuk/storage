<?php

namespace devtoolboxuk\storage;

use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        echo "\nDev-Toolbox - PHP Version: " . PHP_VERSION . "\n";
    }


    public function testRunTimeException()
    {

        if (version_compare(phpversion(), "5.6.0", ">=")) {
            $this->runtimeExceptionOnGetNonExistentAdapter();
            $this->runtimeExceptionOnGetNoAdapter();
        } else {
            echo "\n Skip due to PHP Version";
            $this->markTestSkipped('PHP version not supported');
        }
    }


    private function runtimeExceptionOnGetNonExistentAdapter()
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
