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
        $this->loadPage("waste_map", "waste_map_script", array());
    }
}
