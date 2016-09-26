<?php
class Controller{
    public $model;
    public $view;
    public $table;
    
    function __construct()
    {
        $this->view = new View();
    }
    
    function action_index(){
        
    }
    
    function action_delete($id){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/' . $this->table;
        header('Location:'.$host);
        
        $this->model->deleteRecord($id);
    }
}