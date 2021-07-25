<?php
require_once "config/dbConstants.php";
class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $error;

    public function __construct()
    {
        $this->host = HOST;
        $this->db = DB;
        $this->user = USER;
        $this->password = PASSWORD;
        // if(FLOW_CONTROL)
        //     echo "Database Class<br>";
    }

    function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";"
                . "dbname=" . $this->db . ";"
                . "user=" . $this->user . ";"
                . "password=" . $this->password . ";";

            $options = [
                PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => FALSE,
            ];

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();

            //This error should be sended to the controller and load a failure VIEW
            $this->error = "Error connecting to the database";
            //include VIEWS . '/error/dbError.php';
        }
    }
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }
}
