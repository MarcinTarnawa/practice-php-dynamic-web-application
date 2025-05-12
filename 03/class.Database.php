<?php

class Database {
    
    public $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        // $dsn = "mysql:host={$config['host']};port={$config['port']};dbname='{$config['dbname']}';charset={$config['charset']}";
        $dsn = 'mysql:' . http_build_query($config,'',';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    // universal query
    // public function query($query, $params = [])
    // {       
    //     $statment = $this->connection->prepare($query);
    //     $statment->execute($params);
    //     return $statment;
    // }

    //select All query
    public function selectAll($query) {
        try
    {
        $sql = "select * from db";
        $statment = $this->connection->prepare($sql);
        $statment->execute();
        return $statment->fetchAll();
    }
        catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }
    // select record by ID
    public function selectId($query, $params = []) {
        try
    {
        $sql = "select * from db where id = ?";
        $statment = $this->connection->prepare($sql);
        $statment->execute($params);
        return $statment->fetch();
    }
        catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }
     // select record by name
    public function selectUser($query, $params = []) {
        try
    {  
        $sql = "select * from db where user = ?";
        $statment = $this->connection->prepare($sql);
        $statment->execute($params);
        return $statment->fetchAll();
    }
        catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }
    //delete record by ID
    public function delete($query, $params = []) {
        try
    {
        $sql = "delete from db where id = ?";
        $statment = $this->connection->prepare($sql);
        $statment->execute($params);
        $post = "Record deleted succesfully";
        return $post;
    }   
        catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }

    // update recorb in DB
    public function update($query, $params = []) {
        try
    {
        $sql = "update db set user= :name where id = :id";
        $statment = $this->connection->prepare($sql);
        $statment->bindParam(":id", $id, PDO::PARAM_INT);
        $statment->bindParam(':name', $name, PDO::PARAM_STR);
        $statment->execute($params);
        $post = "Record updated succesfully";
        return $post;
    }
    catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }

    //insert into DB recrod value $name
    public function insert($query, $params = []) {
        try
    {
        $sql = "insert into db (user) values (:name)";
        $statment = $this->connection->prepare($sql);
        $statment->bindParam(':name', $name, PDO::PARAM_STR);
        $statment->execute($params);
        $post = "Record created succesfully";
        return $post;
    }
    catch(PDOException $e)
        {
            die("Error: ".$e->getMessage());
        }
    }
}