<?php
class Controller_Students extends Controller{
    
    function __construct()
    {
        $this->model = new Model_Students();
        $this->view = new View();
    }
    
    function action_index()
    {
        $data = $this->model->get_data();
    }
}