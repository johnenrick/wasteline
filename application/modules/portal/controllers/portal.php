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
        $this->loadPage("portal", array("portal_script", "registration_script", "login_script"), array("message" => false));
    }
    public function visitPage($pageLink = "portal", $pageLink2 = false){
        $data = array(
            "defaultPage" => $pageLink2 ? $pageLink."/".$pageLink2 : $pageLink //if index or function in controller
        );
        $this->load->view("system_application/system_frame", $data);
        $this->load->view("system_application/system");
        $this->load->view("system_application/system_script");
        $this->load->view("system_application/page_header_script");
        
    }
    function login(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()){
            $this->load->model("api/M_account");
            $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, NULL,
                    array(
                        "username" => $this->input->post("username"),
                        "password" => sha1($this->input->post("password"))
                    ));
            if($result){
                $this->session->set_userdata(array(
                    "first_name" => $result[0]["first_name"],
                    "last_name" => $result[0]["last_name"],
                    "middle_name" => $result[0]["middle_name"],
                    "user_type" => $result[0]["account_type_ID"],
                    "user_ID" => $result[0]["ID"],
                    "username" => $result[0]["username"]
                ));
                $this->responseData(true);
            }else{
                $this->responseError(5, "Username and Password Mismatch");
            }
        }else{
           if(count($this->form_validation->error_array())){
                $this->responseError(102, $this->form_validation->error_array());
            }else{
                $this->responseError(100, "Required Fields are empty");
            }
        }
        $this->outputResponse();
    }
    function logout(){
        $this->session->set_userdata(array(
            "first_name" => false,
            "last_name" => false,
            "middle_name" => false,
            "user_type" => false,
            "user_ID" => false
        ));
        header("Location: ".base_url());
        //$this->loadPage("portal", array("portal_script", "registration_script", "login_script"), array("message" => false));
    }
    function passwordRecovery(){
        
    }
    function accountVerification($verificationCode){
        $this->load->model("M_account");
        $accountID = substr($verificationCode, 0, strlen($verificationCode)-10);
        $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, NULL,
                    array(
                        "ID" => $accountID
                    ));
        $message = "";
        if($result){
            if($result["status"] === 3){
                $this->M_account->updateAccount($accountID, NULL, array("status" => 2));
                $message = "Congratulation".$result["username"]."! Your account has been verified. ";
            }else{
                $message = "Your account has already been verified";
            }
        }else{
            $message = "Verification Code is invalid. Contact us if you feel there's something wrong.";
        }
        $this->loadPage("portal", array("portal_script", "registration_script"), array("message"=> $message), false);
    }
}
