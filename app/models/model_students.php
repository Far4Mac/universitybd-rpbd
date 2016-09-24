<?php
class Model_Students extends Model{
    private $_first_name;
    private $_second_name;
    private $_third_name;
    private $_s_birthday;
    private $_group_id;

    function __construct($fname, $sname, $tname, $birth, $g_id)
    {
        $this->_first_name = $fname;
        $this->_second_name = $sname;
        $this->_third_name = $tname;
        $this->_s_birthday = $birth;
        $this->_group_id = $g_id;
    }

    function __construct1(){

    }

    public function get_data(){
        return StudentsDAO::getAllStudents();
    }
}