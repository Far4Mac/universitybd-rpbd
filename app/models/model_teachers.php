<?php
include "app/dao/teachersDAO.php";
class Model_Teachers extends Model{

    function __construct(){

    }

    public function get_data(){
        $data = new TeachersDAO();
        return $data->selectAll();
    }

    public function deleteRecord($id)
    {
        $data = new TeachersDAO();
        return $data->deleteTeacher($id);
    }

    public function addTeacher($fname, $sname, $tname, $birth, $cid, $pid){
        $data = new TeachersDAO();
        return $data->addTeacher($fname, $sname, $tname, $birth, $cid, $pid);
    }
}