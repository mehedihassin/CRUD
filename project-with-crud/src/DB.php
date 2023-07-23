<?php


namespace App;

use PDO;
use PDOException;



class DB
{

    public $host = 'localhost';
    public $db = 'opp_crud';
    public $user = 'root';
    public $password = '';
    public $conn;

    public function __construct()
    {

        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=UTF8";

        try {
            $pdo = new PDO($dsn, $this->user, $this->password);

            if ($pdo) {
                $this->conn = $pdo;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
