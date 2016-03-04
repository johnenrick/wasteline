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
        $this->load->model("M_account_basic_information");
        $this->APICONTROLLERID = 9;
    }
    public function createAccount(){
        $this->accessNumber = 1;
        //registration
        if(($this->input->post("account_type_ID") != 2) && (($this->input->post("account_type_ID") == 1 && user_type() == 1) || ($this->input->post("account_type_ID") == 3 && user_type() == 1) || ($this->input->post("account_type_ID") == 4 ))){
            if(!$this->validReCaptcha() && $this->input->post("account_type_ID") == 4){
                $this->responseError(5, "Invalid Captcha");
                $this->outputResponse();
            }
            $this->responseDebug($this->input->post("username"));
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|callback_is_unique_username');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('account_type_ID', 'Account Type', 'required');
            
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|callback_alpha_dash_space');
            ($this->input->post("middle_name")) ? $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|callback_alpha_dash_space') : null;
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('email_detail', 'Email Detail', 'required|valid_email|callback_is_unique_email');
            
//            $this->form_validation->set_message('alpha_dash_space', 'Only accept alpha and spaces');
            
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
                    /*Create Email*/
                    $this->load->model("M_account_contact_information");
                    $this->M_account_contact_information->createAccountContactInformation(
                            $result,
                            1,
                            $this->input->post("email_detail")
                            );
                    //Send Email Confirmation
                    if($this->input->post("account_type_ID") == 2){
                        $datetime = time();
                        $this->sendEmail("Wasteline Registration Verification", $this->input->post("email_detail"), "Good day ".$this->input->post('username') ."! Thank you for registering in Wasteline.\nTo verify you accout, please click the following link: ".  base_url("portal/accountVerification/".(sprintf("%d%d", $result, $datetime))));
                        $this->responseDebug(base_url("porta/accountVerification/".(sprintf("%d%d", $result, $datetime))));
                    }
                    /*Create Contact Number*/
                    if($this->input->post("contact_number_detail")){
                        $this->M_account_contact_information->createAccountContactInformation(
                            $result,
                            3,
                            $this->input->post("contact_number_detail")
                            );
                    }
                    /*Default Account Address*/
                    $this->load->model("M_account_address");
                    $this->load->model("M_map_marker");
                    $accountAddressID = $this->M_account_address->createAccountAddress($result, 1, $this->input->post("last_name")."'s Residence" );
                    $this->M_map_marker->createMapMarker($accountAddressID, 1, 123.922587, 10.339634);
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
            if(!$this->checkACL(32)){// accessNumber = 16 if not admin
                $this->form_validation->set_rules('ID', 'ID', 'required');
            }
            if($this->checkACL(32) || $this->form_validation->run()){//accessNumber 32 
                $ID = $this->input->post("ID");
                $result = $this->m_account->retrieveAccount(
                        $this->input->post("retrieve_type"),
                        $this->input->post("limit"),
                        $this->input->post("offset"),
                        $this->input->post("sort"),
                        $ID,
                        $this->input->post("condition")
                        );
                if($this->input->post("limit")){
                    $this->responseResultCount($this->m_account->retrieveAccount(
                        1,
                        NULL,
                        NULL,
                        NULL,
                        $ID, 
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
                    if($this->input->post("with_waste_post")){
                        $this->load->model("M_waste_post");
                        $result["waste_post"] = $this->M_waste_post->retrieveWastePost(false, NULL, 0, array("waste_post_type_ID"=>"asc"), NULL, array(
                            "account_ID" => $ID,
                            "status" => 1
                        ));
                    }
                    $this->actionLog(json_encode($this->input->post()));
                    $this->responseData($result);
                }else{
                    $this->responseError(2, "No Result");
                }
            }else{
                if(count($this->form_validation->error_array())){
                    $this->responseError(102, $this->form_validation->error_array());
                }else{
                    $this->responseError(100, "Required Fields are empty");
                }
            }
        }else{
            $this->responseDebug(user_id());
            $this->responseDebug($this->APICONTROLLERID);
            $this->responseDebug($this->accessNumber);
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function updateAccount(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            if($this->input->post("updated_data[username]") != username()){
                $this->form_validation->set_rules('updated_data[username]', 'Username', 'alpha_numeric|callback_is_unique_username');
            }
            $this->form_validation->set_rules('updated_data[password]', 'Password', 'min_length[6]');
            ($this->input->post("updated_data[email_detail]")) ? $this->form_validation->set_rules('updated_data[email_detail]', 'Email Address', 'valid_email|callback_is_unique_email') : null;
            if($this->input->post("updated_data[account_address_longitude]") !== NULL){
                $this->form_validation->set_rules('updated_data[account_address_description]', 'Complete Address', 'trim|required|min_length[2]');
            }
            ($this->input->post('updated_data[first_name]')) ? $this->form_validation->set_rules('updated_data[first_name]', 'First Name', 'trim|callback_alpha_dash_space') : null;
            ($this->input->post('updated_data[last_name]')) ? $this->form_validation->set_rules('updated_data[last_name]', 'Last Name', 'trim|callback_alpha_dash_space') : null;
            ($this->input->post('updated_data[middle_name]')) ? $this->form_validation->set_rules('updated_data[middle_name]', 'Last Name', 'trim|callback_alpha_dash_space') : null;
            if($this->input->post("updated_data[account_address_description]")){
                $this->form_validation->set_rules('updated_data[account_address_longitude]', 'Your Map Location', 'required|greater_than[0]');
                $this->form_validation->set_message('updated_data[account_address_longitude]');
                $this->form_validation->set_message('required', 'Click the map on the right to indicate your location');
                $this->form_validation->set_message('greater_than', 'Click the map on the right to indicate your location');
                
            }
            if($this->form_validation->run()){
                $updatedData = $this->input->post('updated_data');
                $ID = $this->input->post('ID');
                $condition = $this->input->post("condition");
                if(!$this->checkACL(32)){// accessNumber 32 Dont allow to change account type if not admin or LGU
                    if($this->input->post("account_type_ID")){
                        $updatedData["account_type_ID"] = user_type();
                    }
                    if(isset($updatedData["status"])){ // Dont allow to change status
                        unset($updatedData["status"]);
                        $this->responseDebug("deleted");
                    }
                    $ID = user_id();
                }
                $result = $this->m_account->updateAccount(
                        $ID,
                        $condition,
                        $updatedData
                        );
                $condition["account_ID"] = $ID;
                $result1 = $this->M_account_basic_information->updateAccountBasicInformation(
                        NULL,
                        array("account_ID" => $ID),
                        $updatedData
                        );
                if($result || $result1){
                    /**Updating Contact Information**/
                    
                    $this->load->model("M_account_contact_information");
                    /*Email*/
                    if(isset($updatedData["email_ID"]) && $updatedData["email_ID"] && $updatedData["email_detail"]){//update email
                        $this->M_account_contact_information->updateAccountContactInformation( 
                                NULL, 
                                array(
                                    "account_ID" => user_id(), 
                                    "ID" => $updatedData["email_ID"],
                                    "account_contact_information_type_ID" => 1
                                ), 
                                array(
                                    "detail" => $updatedData["email_detail"]
                                ));
                    }else if(isset($updatedData["email_ID"]) && isset($updatedData["email_detail"]) && $updatedData["email_ID"] == 0 && $updatedData["email_detail"]){//create email
                        $this->M_account_contact_information->createAccountContactInformation(user_id(), 1, $updatedData["email_detail"]);
                    }
                    /*Contact Number*/
                    if(isset($updatedData["contact_number_ID"]) && $updatedData["contact_number_ID"] && $updatedData["contact_number_detail"]){//update contact_number
                        $this->M_account_contact_information->updateAccountContactInformation( 
                                NULL, 
                                array(
                                    "account_ID" => user_id(), 
                                    "ID" => $updatedData["contact_number_ID"],
                                    "account_contact_information_type_ID" => 3
                                ), 
                                array(
                                    "detail" => $updatedData["contact_number_detail"]
                                ));
                    }else if(isset($updatedData["contact_number_ID"]) && $updatedData["contact_number_ID"] == 0 && $updatedData["contact_number_detail"]){//create contact_number
                        $this->M_account_contact_information->createAccountContactInformation(user_id(), 3, $updatedData["contact_number_detail"]);
                    }
                    /**Updating Address Information**/
                    $this->load->model("M_account_address");
                    $this->load->model("M_map_marker");
                    if(isset($updatedData["account_address_ID"]) && ($updatedData["account_address_ID"]*1 !== 0) && $updatedData["account_address_description"]){//update account_address
                       
                        /*Account Address*/
                        $this->M_account_address->updateAccountAddress( NULL, 
                                array(
                                    "account_ID" => user_id(),
                                    "ID" => $updatedData["account_address_ID"]
                                ), 
                                array(
                                    "description" => $updatedData["account_address_description"],
                                ));
                        /*Map Marker*/
                        $this->M_map_marker->updateMapMarker( NULL, 
                                array(
                                    "account_address.account_ID" => user_id(),
                                    "ID" => $updatedData["account_address_map_marker_ID"],
                                    "map_marker_type_ID" => 1
                                ), 
                                array(
                                    "longitude" => $updatedData["account_address_longitude"],
                                    "latitude" => $updatedData["account_address_latitude"],
                                ));
                    }else if(isset($updatedData["account_address_ID"]) && $updatedData["account_address_ID"]*1 == 0 && $updatedData["account_address_description"]){//create account_address
                        $accountAddressID = $this->M_account_address->createAccountAddress(user_id(), 1, $updatedData["account_address_description"]);
                        $this->M_map_marker->createMapMarker($accountAddressID, 1, $updatedData["account_address_longitude"], $updatedData["account_address_latitude"]);
                    }
                    $this->actionLog(json_encode($this->input->post()));
                    $this->responseData($result || $result1);
                }else{
                    $this->responseError(3, "Failed to Update");
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
    public function alpha_dash_space($str){
        $this->form_validation->set_message('alpha_dash_space', '{field} only accepts alphabets and spaces');
        return ( !preg_match('/^[ a-z - ñÑ]+$/iu', $str)) ? false : true;
    }
    public function is_unique_email($str){
        $this->load->model("M_account_contact_information");
        $result = $this->M_account_contact_information->retrieveAccountContactInformation(false, NULL, 0, array(), NULL, array(
            "detail"=>$str
        ));
        $this->form_validation->set_message('is_unique_email', '{field} already used.');
        if($result){
            return false;
        }else{
            return true;
        }
    }
    public function is_unique_username($str){
        $this->load->model("M_account");
        $result = $this->m_account->retrieveAccount(false, NULL, 0, array(), NULL, array(
            "username"=>$str
        ));
        $this->responseDebug($str);
        $this->form_validation->set_message('is_unique_username', '{field} already used.');
        if($result){
            return false;
        }else{
            return true;
        }
    }
    public function validReCaptcha(){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6Ld26BkTAAAAAHFkrfknWzaQhRkey-edRO5KEMU0', 
            'response' => $this->input->post("g-recaptcha-response")
                );

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result, true);
        return $response["success"];
    }
}