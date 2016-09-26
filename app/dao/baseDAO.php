<?php
define('DB_CONNECT_STRING', 'mysql:host=localhost;dbname=university');
define('DB_USER', 'root');
define('DB_PASS', '');


abstract class BaseDAO{
    protected $_connection;

    public function __construct()
    {
        $this->_connectToDB(DB_CONNECT_STRING, DB_USER, DB_PASS);
    }

    private function _connectToDB($connection_string, $user, $pass){
        try{
            $this->_connection = new PDO($connection_string,$user,$pass);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            die("Connection error: " . $e->getMessage());
        }
    }

    public function select($value, $key = NULL){
        if(is_null($key)){
            $key = $this->_primaryKey;
        }

        try{
            $query = "SELECT * FROM {$this->_tableName} WHERE {$key}='{$value}'";

            $queryHandler = $this->_connection->prepare($query);
            $queryHandler->execute();

            return $queryHandler->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            die("Fetch error: " . $e->getMessage());
        }
    }
    
    public function selectAll(){
        try{
            $query = "SELECT * FROM {$this->_tableName}";
            
            $queryHandler = $this->_connection->prepare($query);
            $queryHandler->execute();
            
            return $queryHandler->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            die("Fetch error: " . $e->getMessage());
        }
    }

    public function update($keyedArray){
        $query = "UPDATE {$this->_tableName} SET";

        $updates = array();
        foreach ($keyedArray as $column=>$value){
            $updates[] = "{$column}='{$value}'";
        }

        $query .= implode(',', $updates);
        $query .= "WHERE {$this->_primaryKey}='{$keyedArray[$this->_primaryKey]}'";

        try{
            $queryHandler = $this->_connection->prepare($query);
            $queryHandler->execute();

            return ($queryHandler->rowCount()) ? "Update successful" : "Update failed";
        }catch (PDOException $e){
            die("Update error: " . $e->getMessage());
        }
    }

    public function delete($id){
        $query = "DELETE FROM {$this->_tableName}" .
            " WHERE {$this->_primaryKey}='{$id}'";

        try{
            $queryHandler = $this->_connection->prepare($query);
            $queryHandler->execute();

            return ($queryHandler->rowCount()) ? "Delete successful" : "Delete failed";
        }catch (PDOException $e){
            die("Delete error: " . $e->getMessage());
        }
    }
}