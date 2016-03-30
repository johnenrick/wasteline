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
            "defaultPage" => ($pageLink2 !== "false" && $pageLink2 !== false) ? $pageLink."/".$pageLink2 : $pageLink, //if index or function in controller
            "extra_data" => ($extraData) ? base64_decode($extraData) : false
        );
        $this->load->view("system_application/system_frame", $data);
        $this->load->view("system_application/system");
        $this->load->view("system_application/system_script");
        $this->load->view("system_application/page_header_script");
        if(user_id()){
            $this->load->view("system_application/waste_post_script");
        }
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
                $this->responseDebug($result);
                $this->createSession($result[0]["first_name"], $result[0]["last_name"], $result[0]["middle_name"], $result[0]["account_type_ID"], $result[0]["ID"], $result[0]["username"]);
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
    public function refreshSession(){
        $this->responseDebug(user_id());
        if(user_id()){
            $this->load->model("api/M_account");
            $result = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, user_id(), array("status" => 1));
            $this->responseDebug($result);
            if($result){
                $this->createSession($result["first_name"], $result["last_name"], $result["middle_name"], $result["account_type_ID"], user_id(), $result["username"]);
                $this->responseData($result);
            }else{
                $this->responseError(2, "Account Not Found");
            }
        }else{
            $this->responseError(1, "Log In Required");
        }
        $this->outputResponse();
    }
    function logout(){
        $this->createSession(false, false, false, false, false, false);
        header("Location: ".base_url());
    }
    function passwordRecoveryRequest(){
        $this->form_validation->set_rules('email_detail', 'Email Address', 'required|valid_email');
        if($this->form_validation->run()){
            $this->load->model("api/M_account");
            $accountDetail = $this->M_account->retrieveAccount(0, NULL, 0, NULL, NULL, array("email__detail" => $this->input->post("email_detail")));
            if($accountDetail){
                $this->load->model("api/M_password_recovery");
                $datetime = time();
                $passwordRecoveryID = $this->M_password_recovery->createPasswordRecovery($accountDetail[0]["ID"], $datetime);
                $recoveryCode = sprintf("%d%04d%04d",$datetime, $passwordRecoveryID, $accountDetail[0]["ID"]);
                $this->sendEmail("Wasteline Password Recovery", $this->input->post("email_detail"), "Good day, ".$accountDetail[0]['username'] ."! Please click the link to change your password :".  base_url("portal/recoverPassword/".$recoveryCode));
                $this->responseDebug($recoveryCode);
            }else{
                $this->responseError(1, "That email is not use");
            }
            $this->responseDebug($this->input->post("email_detail"));
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
                $this->createSession($accountDetail["first_name"], $accountDetail["last_name"], $accountDetail["middle_name"], $accountDetail["account_type_ID"], $accountDetail["ID"], $accountDetail["username"]);
                $this->M_password_recovery->updatePasswordRecovery($recoveryID, array(), array("status" => 1));
                header("Location: ".base_url("portal/visitPage/profile_management"));
            }else if($recoveryDetail != false && $recoveryDetail["status"] == 1){
                print_r($recoveryDetail);
                $message[0] = array(
                    "status"=> 1,
                    "type" => 2,
                    "message" => "Your recovery link has already expired or invalid. Please make another request"
                    );
            }else{
                $message[0] = array(
                    "status"=> 2,
                    "type" => 2,
                    "message" => "Invalid recovery link"
                    );
            }
            $extraData = base64_encode (json_encode(array("message" => $message)));
            header("Location: "+base_url("portal/visitPage/portal/false/".$extraData));
        }else{
            "Nice Try";
        }
    }
    function requestVerificationCode(){
        if(user_id()){
            $this->load->model("api/M_account");
            $accountDetail = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, user_id());
            if($accountDetail && $accountDetail["account_type_ID"] == 4){
                $datetime = time();
                $this->responseDebug(base_url("portal/accountVerification/".(sprintf("%d%d", $accountDetail["ID"], $datetime))));
                $this->sendEmail("Wasteline Registration Verification", $this->input->post("email_detail"), "Good day ".$this->input->post('username') ."! Thank you for registering in Wasteline.\nTo verify you accout, please click the following link: ".  base_url("portal/accountVerification/".(sprintf("%d%d", $accountDetail["ID"], $datetime))));
                $this->responseData($accountDetail["email_detail"]);
                
            }else{
                $this->responseError(1, "Account already verified");
            }
        }else{
            $this->responseError(1001);//Not logged ins
        }
        $this->outputResponse();
    }
    function accountVerification($verificationCode){
        $this->load->model("api/M_account");
        $accountID = substr($verificationCode, 0, strlen($verificationCode)-10);
        $accountDetail = $this->M_account->retrieveAccount(NULL, NULL, NULL, NULL, $accountID);
        $message = array();
        if($accountDetail){
            if($accountDetail["account_type_ID"] == 4){
                $this->M_account->updateAccount($accountID, NULL, array("account_type_ID" => 2));
                if(user_id()){
                    $this->createSession($accountDetail["first_name"], $accountDetail["last_name"], $accountDetail["middle_name"], 2, $accountDetail["ID"], $accountDetail["username"]);
                }
                header("Location: ".base_url("portal/visitPage"));
            }else{
                $message[0] = array(
                    "status" => 12,
                    "type" => 4,
                    "message" => "Your account has already been verified"
                    );
            }
        }else{
            $message[0] = array(
                    "status" => 13,
                    "type" => 2,
                    "message" => "Verification Code is invalid. Contact us if you feel there s something wrong."
                    );
        }
        $extraData = str_replace("=","",base64_encode(json_encode(array("message" => $message))));
        header("Location: ".base_url("portal/visitPage/portal/false/". $extraData));
    }
    protected function createSession($firstName, $lastName, $middleName, $userType, $userID, $username){
        $this->session->set_userdata(array(
            "first_name" => $firstName,
            "last_name" => $lastName,
            "middle_name" => $middleName,
            "user_type" => $userType,
            "user_ID" => $userID,
            "username" => $username
        ));
    }
}
