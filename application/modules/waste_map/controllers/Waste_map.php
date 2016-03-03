<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portal
 *
 * @author yong
 */
class Waste_map extends FE_Controller{
    //put your code here
    function index(){
        $script = array("waste_map_script");
        if(user_type()*1 === 3){
            $script[] = "waste_map_lgu_script";
        }else{
            $script[] = "waste_map_normal_user_script";
        }
        $this->loadPage("waste_map", $script, array());
    }
}
