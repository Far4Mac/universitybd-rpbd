<?php
include 'baseDAO.php';

class StudentsDAO extends BaseDAO{
    protected $_tableName = 'students';
    protected $_primaryKey = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllStudents(){
        return $this->selectAll();
    }

    public function addStudent($fname, $sname, $tname, $birth, $g_id){
        $query = "INSERT INTO {$this->_tableName}(first_name, second_name, third_name, s_birthday, group_id)"
         . " VALUES(:fname, :sname, :tname, :birth, :gid)";
        
        try{
            $queryHandler = $this->_connection->prepare($query);
            $parameters = array(':fname'=>$fname, ':sname'=>$sname, ':tname'=>$tname,':birth'=>$birth,':gid'=>$g_id);
            $queryHandler->execute($parameters);
        }catch (PDOException $e){
            die("Insert exception: " . $e->getMessage());
        }
    }
    
    public function deleteStudent($id){
        return $this->delete($id);
    }
}