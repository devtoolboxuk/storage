<?php

namespace devtoolboxuk\storage\Adapter;

/**
 * Base Abstract Database Adapter.
 */
abstract class AbstractAdapter implements AdapterInterface
{

    protected $dbOptions = [];
    protected $connection;

    public function __construct(array $options)
    {
        $this->setDbOptions($options);
    }

    public function getDbOptions()
    {
        return $this->dbOptions;
    }

    public function setDbOptions(array $options)
    {
        $this->dbOptions = $options;
        return $this;
    }
    
    public function getDbOption($name)
    {
        if (!$this->hasDbOption($name)) {
            return null;
        }

        return $this->dbOptions[$name];
    }

    public function hasDbOption($name)
    {
        return isset($this->options[$name]);
    }

}
