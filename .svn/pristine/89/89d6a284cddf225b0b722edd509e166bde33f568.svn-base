<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of api_generator
 *
 * @author johnenrick
 */
class Api_generator extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("api/m_access_control_list");
    }
    public function index(){
        $this->load->view("api_generator");
        $this->load->view("api_generator_script");
        
    }
}
