<?php

namespace app\db;

use vendor\Yaml;

class DBConnection
{
    public function __construct()
    {
        $file = fopen('database.yml');
        $this->config = (new YamlLoader())->parse($file)['database'];
    }

    protected function connect()
    {
        /**
         * @todo  dispatch event for connecting.
         */
        $connecton = null;
        if (isset($this->config['driver']) && $this->config['driver'] == 'pdo_mysql') {
            if ($this->config['driver'] == 'pdo_mysql') {
                $connection = new PDO($dsn, $this->config['user'], $this->config['password']);
            }
        }

        return null;
    }
}