<?php
include 'baseDAO.php';

class TeachersDAO extends BaseDAO{
    protected $_tableName = 'teachers';
    protected $_primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllTeachers(){
        return $this->selectAll();
    }

    public function addTeacher($fname, $sname, $tname, $birth, $c_id, $p_id){
        $query = "INSERT INTO {$this->_tableName}(first_name, second_name, third_name, t_birthday, cathedral_id, position_id)"
            . " VALUES(:fname, :sname, :tname, :birth, :cid, :pid)";

        try{
            $queryHandler = $this->_connection->prepare($query);
            $parameters = array(':fname'=>$fname, ':sname'=>$sname, ':tname'=>$tname,':birth'=>$birth,':cid'=>$c_id, ':pid'=>$p_id);
            $queryHandler->execute($parameters);
        }catch (PDOException $e){
            die("Insert exception: " . $e->getMessage());
        }
    }

    public function deleteTeacher($id){
        return $this->delete($id);
    }
}