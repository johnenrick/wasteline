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
class Portal extends FE_Controller{
    //put your code here
    function index(){
        $this->loadPage("portal", array("registration_script"), array(), false);
    }
    function login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()){
            $this->load->model("api/m_account");
        }else{
            if($this->input->post()){
                $this->responseError(100, $this->form_validation->error_array());
            }else{
                $this->responseError(101, "Required information not found");
            }
        }
        $this->outputResponse();
    }
    function carousel(){
        $this->load->view("carousel");
    }
}
