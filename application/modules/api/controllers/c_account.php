<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_account extends API_Controller {
    /*
     * Access Control List
     * 1    - createAccount
     * 2    - retrieveAccount
     * 4    - updateAccount
     * 8    - deleteAccount
     * 16   - batchCreateAccount
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_account");
        $this->APICONTROLLERID = 1;
    }
    public function createAccount(){
        $this->accessNumber = 1;
        //registration
        $valid  =true;
        if(!$valid){
            $this->responseError(5, "Captcha Required");
        }
        if($this->checkACL() && (($this->input->post("account_type_ID") == 1 && user_type() == 1) || ($this->input->post("account_type_ID") == 3 && user_type() == 1) || ($this->input->post("account_type_ID") == 2 && $this->input->post("status") == 3 && $this->validReCaptcha()))){
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[account.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('account_type_ID', 'Account Type', 'required');
            
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('middle_name', 'Middle Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email|is_unique[account_contact_information.detail]');
            
            if($this->form_validation->run()){
                $result = $this->m_account->createAccount(
                        $this->input->post("username"),
                        $this->input->post("password"),
                        $this->input->post("account_type_ID"),
                        $this->input->post("status")
                        );
                if($result){
                    $this->load->model("m_account_basic_information");
                    $this->m_account_basic_information->createAccountBasicInformation(
                            $result,
                            $this->input->post("first_name"),
                            $this->input->post("middle_name"),
                            $this->input->post("last_name") 
                            );
                    $this->load->model("M_account_contact_information");
                    $this->M_account_contact_information->createAccountContactInformation(
                            $result,
                            1,
                            $this->input->post("email_address")
                            );
                    //Send Email Confirmation
                    if($this->input->post("account_type_ID") == 2){
                        $this->load->library('email');

                        $this->email->from('plenosjohn@yahoo.com', 'John Enrick');
                        $this->email->to($this->input->post("email_address"));

                        $this->email->subject('Wasteline Registration Verification');
                        $this->email->message("Good day ".$this->input->post('username') ."! Thank you for registering in Wasteline.\nTo verify you accout, please click the following link: ".  base_url("porta/accountVerification/".((""+$result).(""+ time()))));	

                        $this->email->send();
                    }
                    $this->actionLog($result);
                    $this->responseData($result);
                }else{
                    $this->responseError(3, "Failed to create");
                }
            }else{
                if(count($this->form_validation->error_array())){
                    $this->responseError(102, $this->form_validation->error_array());
                }else{
                    $this->responseError(100, "Required Fields are empty");
                }
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function retrieveAccount(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_account->retrieveAccount(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_account->retrieveAccount(
                    1,
                    NULL,
                    NULL,
                    NULL,
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    ));
            }
            if($result){
                if($this->input->post("with_contact_information") || $this->input->post("all_information")){
                    $this->load->model("m_account_contact_information");
                    
                    if($this->input->post("ID")){
                        $condition = array("account_contact_information__account_ID" => $result["ID"]);
                        $result["contact_information"] = $this->m_account_contact_information->retrieveAccountContactInformation(NULL, NULL, NULL, NULL, NULL, $condition);
                    }else{
                        foreach($result as $resulKey => $resultValue){
                            $condition = array("account_contact_information__account_ID" => $resultValue["ID"]);
                            $result[$resulKey]["contact_information"] = $this->m_account_contact_information->retrieveAccountContactInformation(NULL, NULL, NULL, NULL, NULL, $condition);
                        }
                    }
                }
                if($this->input->post("with_address") || $this->input->post("all_information")){
                    $this->load->model("M_account_address");
                    if($this->input->post("ID")){
                        $condition = array("account_address__account_ID" => $result["ID"]);
                        $result["address"] = $this->M_account_address->retrieveAccountAddress(NULL, NULL, NULL, NULL, NULL, $condition);
                    }else{
                        foreach($result as $resulKey => $resultValue){
                            $condition = array("account_address__account_ID" => $resultValue["ID"]);
                            $result[$resulKey]["address"] = $this->M_account_address->retrieveAccountAddress(NULL, NULL, NULL, NULL, NULL, $condition);
                        }
                    }
                }
                
                $this->actionLog(json_encode($this->input->post()));
                $this->responseData($result);
            }else{
                $this->responseError(2, "No Result");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    
    public function updateAccount(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            $result = $this->m_account->updateAccount(
                    $this->input->post("ID"),
                    $this->input->post("condition"),
                    $this->input->post("updated_data")
                    );
            if($result){
                $this->actionLog(json_encode($this->input->post()));
                $this->responseData($result);
            }else{
                $this->responseError(3, "Failed to Update");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function deleteAccount(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_account->deleteAccount(
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($result){
                $this->actionLog(json_encode($this->input->post()));
                $this->responseData($result);
            }else{
                $this->responseError(3, "Failed to delete");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function validReCaptcha(){
//        $url = 'https://www.google.com/recaptcha/api/siteverify';
//        $data = array('secret' => '6LehRRUTAAAAAI4FaRRWhVpjjNarhe4ZYjaodC7y', 'response' => "The value of 'g-recaptcha-response'.");
//
//        // use key 'http' even if you send the request to https://...
//        $options = array(
//            'http' => array(
//                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//                'method'  => 'POST',
//                'content' => http_build_query($data),
//            ),
//        );
//        $context  = stream_context_create($options);
//        $result = file_get_contents($url, false, $context);
//        if ($result === FALSE) { /* Handle error */ }
//        $response = json_decode($result, true);
        return true;
    }
}
