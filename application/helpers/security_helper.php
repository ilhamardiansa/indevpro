<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('name')){
        redirect('auth');
    }
}


    function checkadmin()
{
    $ci = get_instance();
    if($ci->session->userdata('role') != 1){
        redirect('auth/blocked');
    }
}