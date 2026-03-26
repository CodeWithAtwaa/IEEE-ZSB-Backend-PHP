<?php

use PDO;

class Database
{
    public $connection;
    public $statment;
    public function __construct($config, $username, $password)
    {

        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statment = $this->connection->prepare($query);
        $this->statment->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statment->fetch();
    }

    public function findOrFail()
    {
        $reslut = $this->find();
        if (! $reslut) {
            abort();
        }
        return $reslut;
    }

    public function all()
    {
        return $this->statment->fetchAll();
    }

    function get()
    {
        return $this->statment->fetchAll();
    }
}
