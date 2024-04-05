<?php
namespace Core;
use PDO;
class Database
{
    public $connection;
    public $statement;


    public function __construct($config, $username = 'root', $password = 'Joel1995.com')
    {
        //the database gets called automatically when a new instance is created
        $dsn = 'mysql:' . http_build_query($config, '', ';'); //binds the query string to "mysql:host=localhost;port=3306;...etc"

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findorAbort()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function get(){
        return $this->statement->fetchAll();
    }
}