<?php
namespace Core;
use PDO;

class Database
{
    public $connection;
    public $statement;
    
    public function __construct($config, $username = "root", $password = "MyRoot@1234")
    {
        $config['dbname'] = "IEEE_Backend_PHP";
        $dsn = "mysql:" . http_build_query($config, '', ';');
        // dd($config);
       

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function query($sql, array $params = [])
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }


    public function find()
    {
        return $this->statement->fetch();
    }

    public function  findOrFaild()
    {
        $result = $this->statement->fetch();
        if (! $result) {
            abort();
        }
        return $result;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public  function all()
    {
        return $this->statement->fetchAll();
    }
}
