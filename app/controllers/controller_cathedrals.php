<?php
class Controller_Cathedrals extends Controller{

    public $table = "cathedrals";
    function __construct()
    {
        $this->model = new Model_Cathedrals();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('view_cathedrals.php', 'header.php', $data);
    }

    function action_delete($id){
        if(isset($id)){
            parent::action_delete($id);
        }
    }

    function action_insert(){
        if(isset($_POST['submit'])){
            $this->model->addCathedral($_POST['cath_name']);
        }
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/cathedrals';
        header('Location:'.$host);
    }
}