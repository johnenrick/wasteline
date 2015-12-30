<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of portal
 *
 * @author johnenrick
 */
class Report_management extends FE_Controller{
    //put your code here
    function index(){
        $this->loadPage("report_management", "report_management_script");
    }
}
