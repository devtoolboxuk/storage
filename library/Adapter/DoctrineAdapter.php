<?php

namespace devtoolboxuk\storage\Adapter;

use Doctrine\DBAL\DriverManager;

class DoctrineAdapter extends AbstractAdapter implements AdapterInterface
{
    function connection()
    {
        return DriverManager::getConnection(parent::getDbOptions());
    }
}