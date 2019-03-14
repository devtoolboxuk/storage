<?php

namespace devtoolboxuk\storage\Adapter;

/**
 * Base Abstract Database Adapter.
 */
abstract class AbstractAdapter implements AdapterInterface
{

    protected $adapterOptions = [];
    protected $connection;

    public function __construct(array $options)
    {
        $this->setAdapterOptions($options);
    }

    public function getAdapterOptions()
    {
        return $this->adapterOptions;
    }

    public function setAdapterOptions(array $options)
    {
        $this->adapterOptions = $options['config'];
        return $this;
    }

    public function getAdapterOption($name)
    {
        if (!$this->hasAdapterOption($name)) {
            return null;
        }

        return $this->adapterOptions[$name];
    }

    public function hasAdapterOption($name)
    {
        return isset($this->adapterOptions[$name]);
    }

}
