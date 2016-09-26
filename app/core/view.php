<?php
class View{

    function generate($content_view, $template_view, $data = null){
        include '/app/views/'.$template_view;
        include '/app/views/'.$content_view;
    }
}