<?php
class Controller_Subjects extends Controller{

    public $table = "subjects";
    function __construct()
    {
        $this->model = new Model_Subjects();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('view_subjects.php', 'header.php', $data);
    }

    function action_delete($id){
        if(isset($id)){
            parent::action_delete($id);
        }
    }

    function action_insert(){
        if(isset($_POST['submit'])){
            $this->model->addSubject($_POST['sub_name']);
        }
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/Subjects';
        header('Location:'.$host);
    }
}