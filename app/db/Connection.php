<?php

namespace app\db;

use app\db\DBConnection;

public function Connection extends DBConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getConnection()
    {
        return $this->connect();
    }
}