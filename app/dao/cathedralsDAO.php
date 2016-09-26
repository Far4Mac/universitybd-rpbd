<?php
include 'baseDAO.php';

class CathedralsDAO extends BaseDAO{
    protected $_tableName = 'cathedrals';
    protected $_primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllCathedrals(){
        return $this->selectAll();
    }

    public function addCathedral($cathname){
        $query = "INSERT INTO {$this->_tableName}(cath_name)"
            . " VALUES(:cathname)";

        try{
            $queryHandler = $this->_connection->prepare($query);
            $parameters = array(':cathname'=>$cathname);
            $queryHandler->execute($parameters);
        }catch (PDOException $e){
            die("Insert exception: " . $e->getMessage());
        }
    }

    public function deleteCathedral($id){
        return $this->delete($id);
    }
}