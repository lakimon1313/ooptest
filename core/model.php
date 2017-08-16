<?php

namespace core;

use PDO;
use PDOException;

class Model
{
    public $conn;

    public function __construct()
    {
        $config = require $_SERVER['DOCUMENT_ROOT'] . '/config.php';
        try {
            $this->conn = new PDO("mysql:host=" . $config['mysql']['servername'] . ";dbname=" . $config['mysql']['db_name'], $config['mysql']['username'], $config['mysql']['password']);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}