<?php
include "app/dao/subjectsDAO.php";
class Model_Subjects extends Model{

    function __construct(){

    }

    public function get_data(){
        $data = new SubjectsDAO();
        return $data->selectAll();
    }

    public function deleteRecord($id)
    {
        $data = new SubjectsDAO();
        return $data->deleteSubject($id);
    }

    public function addSubject($subname){
        $data = new SubjectsDAO();
        return $data->addSubject($subname);
    }
}