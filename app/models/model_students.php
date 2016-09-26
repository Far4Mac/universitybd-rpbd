<?php

include "app/dao/studentsDAO.php";
class Model_Students extends Model{
    
    function __construct(){

    }

    public function get_data(){
        $data = new StudentsDAO();
        return $data->selectAll();
    }
    
    public function deleteRecord($id)
    {
        $data = new StudentsDAO();
        return $data->deleteStudent($id);
    }
    
    public function addStudent($fname, $sname, $tname, $birth, $gid){
        $data = new StudentsDAO();
        return $data->addStudent($fname, $sname, $tname, $birth, $gid);
    }
}