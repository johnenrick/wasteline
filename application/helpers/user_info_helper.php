<?php
 function user_id(){
    $CI =& get_instance();
    return $CI->session->userdata('user_ID')*1;
}
function user_type(){
    $CI =& get_instance();
    return $CI->session->userdata('user_type')*1;
}
function user_first_name(){
    $CI =& get_instance();
    return $CI->session->userdata('first_name');
}
function user_last_name(){
    $CI =& get_instance();
    return $CI->session->userdata('last_name');
}
function user_middle_name(){
    $CI =& get_instance();
    return $CI->session->userdata('middle_name');
}
function username(){
    $CI =& get_instance();
    return $CI->session->userdata('username');
}