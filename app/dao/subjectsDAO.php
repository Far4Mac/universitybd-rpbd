<?php
include 'baseDAO.php';

class SubjectsDAO extends BaseDAO{
    protected $_tableName = 'subjects';
    protected $_primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllSubjects(){
        return $this->selectAll();
    }

    public function addSubject($subname){
        $query = "INSERT INTO {$this->_tableName}(sub_name)"
            . " VALUES(:subname)";

        try{
            $queryHandler = $this->_connection->prepare($query);
            $parameters = array(':subname'=>$subname);
            $queryHandler->execute($parameters);
        }catch (PDOException $e){
            die("Insert exception: " . $e->getMessage());
        }
    }

    public function deleteSubject($id){
        return $this->delete($id);
    }
}