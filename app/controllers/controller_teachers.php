<?php
class Controller_Teachers extends Controller{

    public $table = "teachers";
    function __construct()
    {
        $this->model = new Model_Teachers();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('view_teachers.php', 'header.php', $data);
    }

    function action_delete($id){
        if(isset($id)){
            parent::action_delete($id);
        }
    }

    function action_insert(){
        if(isset($_POST['submit'])){
            $this->model->addTeacher($_POST['first_name'], $_POST['second_name'],
                $_POST['third_name'], $_POST['t_birthday'], $_POST['cathedral_id'], $_POST['position_id']);
        }
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/Teachers';
        header('Location:'.$host);
    }
}