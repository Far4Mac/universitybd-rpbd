<?php
include "app/dao/cathedralsDAO.php";
class Model_Cathedrals extends Model{

    function __construct(){

    }

    public function get_data(){
        $data = new CathedralsDAO();
        return $data->selectAll();
    }

    public function deleteRecord($id)
    {
        $data = new CathedralsDAO();
        return $data->deleteCathedral($id);
    }

    public function addCathedral($cathname){
        $data = new CathedralsDAO();
        return $data->addCathedral($cathname);
    }
}