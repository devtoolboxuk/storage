<?php

namespace devtoolboxuk\storage\Adapter;

class AdapterFactory
{
    protected static $instance;

    protected $adapters = [
        'mysql' => __NAMESPACE__ . '\Adapter\DoctrineAdapter'
    ];

    public static function instance()
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function registerAdapter($name, $class)
    {
        if (!is_subclass_of($class, 'devtoolboxuk\storage\AdapterInterface')) {
            throw new \RuntimeException(sprintf(
                'Adapter class "%s" must implement devtoolboxuk\\storage\\Adapter\\AdapterInterface',
                $class
            ));
        }
        $this->adapters[$name] = $class;

        return $this;
    }

    public function getAdapter($name, array $options)
    {
        $class = $this->getClass($name);
        return new $class($options);
    }

    /**
     * Get an adapter class by name.
     *
     * @throws \RuntimeException
     * @param  string $name
     * @return string
     */
    protected function getClass($name)
    {
        if (empty($this->adapters[$name])) {
            throw new \RuntimeException(sprintf(
                'Adapter "%s" has not been registered',
                $name
            ));
        }

        return $this->adapters[$name];
    }
}
