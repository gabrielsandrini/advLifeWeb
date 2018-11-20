<?php
class FactoryConnection
{
    private $connection;
    
    function __construct()
    {
        try
        {
            $this->connection = new PDO("mysql:host=localhost:3306;dbname=adventureslife;charset=utf8", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e)
        {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function getConnection()
    {
        return $this->connection;
    }
    
    function __destruct()
    {
        $this->connection = null;
    }
}
