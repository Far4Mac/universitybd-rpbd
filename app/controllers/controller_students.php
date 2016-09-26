<?php
class Controller_Students extends Controller{
    public $table = "students";
    function __construct()
    {
        $this->model = new Model_Students();
        $this->view = new View();
    }
    
    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('view_students.php', 'header.php', $data);
    }
    
    function action_delete($id){
        if(isset($id)){
            parent::action_delete($id);
        }
    }

    function action_insert(){
        if(isset($_POST['submit'])){
            $this->model->addStudent($_POST['first_name'], $_POST['second_name'],
                $_POST['third_name'], $_POST['s_birthday'], $_POST['group_id']);
        }
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/Students';
        header('Location:'.$host);
    }
}