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
    public function visitPage($pageLink = "portal", $pageLink2 = false, $extraData = false){
        $data = array(
            "defaultPage" => $pageLink2 ? $pageLink."/".$pageLink2 : $pageLink, //if index or function in controller
            "extra_data" => $extraData
        );
        $this->load->view("system_application/system_frame", $data);
        $this->load->view("system_application/system");
        $this->load->view("system_application/system_script");
        $this->load->view("system_application/page_header_script");
        $this->load->view("system_application/waste_post_script");
        
        
    }
    function login(){
        $this->form_validation->set_rules('username', 'Username/Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()){
            $this->load->model("api/M_account");
            $condition = array();
            $condition["password"] = sha1($this->input->post("password"));
            $condition[(filter_var($this->input->post("username"), FILTER_VALIDATE_EMAIL)) ? "email__detail" : "username"] = $this->input->post("username");
            $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, NULL,$condition);
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
                $this->responseError(5, "Username/Email and Password Mismatch");
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
    function testing(){
        $this->form_validation->set_rules('email_address', 'Email Address', 'alpha_numeric');
        if($this->form_validation->run()){
            
        }
    }
    function passwordRecoveryRequest(){
        $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
        if($this->form_validation->run()){
            $this->load->model("api/M_account");
            $accountDetail = $this->M_account->retrieveAccount(0, NULL, 0, NULL, NULL, array("email__detail" => $this->input->post("email_address")));
            if($accountDetail){
                $this->load->model("api/M_password_recovery");
                $datetime = time();
                $passwordRecoveryID = $this->M_password_recovery->createPasswordRecovery($accountDetail[0]["ID"], $datetime);
                $recoveryCode = sprintf("%d%04d%04d",$datetime, $passwordRecoveryID, $accountDetail[0]["ID"]);
                $this->sendEmail("Wasteline Password Recovery", $this->input->post("email_address"), "Good day, ".$accountDetail[0]['username'] ."! Please click the link to change your password :".  base_url("portal/recoverPassword/".$recoveryCode));
                $this->responseDebug($recoveryCode);
            }else{
                $this->responseError(1, "That email is not use");
            }
            $this->responseDebug($this->input->post("email_address"));
        }else{
            if(count($this->form_validation->error_array())){
                $this->responseError(102, $this->form_validation->error_array());
            }else{
                $this->responseError(100, "Required Fields are empty");
            }
        }
        $this->outputResponse();
    }
    function recoverPassword($recoveryCode){
        if(strlen($recoveryCode) === 18){
            $message = array();
            $this->load->model("api/M_password_recovery");
            $datetime = substr($recoveryCode, 0, 10)." - ";//time
            $recoveryID = substr($recoveryCode, 10, 4)." - ";//recoID
            $accountID = substr($recoveryCode, 14, 4);//acc
            echo  $datetime." - ".$recoveryID." - ".$accountID;
            $recoveryDetail = $this->M_password_recovery->retrievePasswordRecovery(false, NULL, 0, array(), $recoveryID);
            
            if($recoveryDetail != false && $recoveryDetail["datetime"]*1 == $datetime*1 && $recoveryDetail["account_ID"] == $accountID && $recoveryDetail["status"] == 0){
                print_r($recoveryDetail);
                $this->load->model("api/M_account");
                $accountDetail = $this->M_account->retrieveAccount(0, NULL, 0, array(), $accountID);
                $this->session->set_userdata(array(
                    "first_name" => $accountDetail["first_name"],
                    "last_name" => $accountDetail["last_name"],
                    "middle_name" => $accountDetail["middle_name"],
                    "user_type" => $accountDetail["account_type_ID"],
                    "user_ID" => $accountDetail["ID"],
                    "username" => $accountDetail["username"]
                ));
                $this->M_password_recovery->updatePasswordRecovery($recoveryID, array(), array("status" => 1));
                header("Location: ".base_url("portal/visitPage/profile_management"));
            }else if($recoveryDetail != false && $recoveryDetail["status"] == 1){
                print_r($recoveryDetail);
                $message["1"] = "Your recovery link has already expired or invalid. Please make another request";
            }else{
                
                $message["1"] = "Invalid recovery link";
            }
            header("Location: "+base_url("portal/visitPage/portal/false/".json_encode($message)));
        }else{
            "Nice Try";
        }
    }
    function accountVerification($verificationCode){
        $this->load->model("api/M_account");
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
