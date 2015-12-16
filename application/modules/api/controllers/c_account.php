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
        if($this->checkACL()){
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[account.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('account_type_ID', 'Account Type', 'required');
            
            $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|alpha');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            
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
                            $this->input->post("last_name"),
                            $this->input->post("address"),
                            $this->input->post("status")
                            );
                    $this->actionLog($result);
                    $this->responseData($result);
                }else{
                    $this->responseError(3, "Failed to create");
                }
            }else{
                if(count($this->form_validation->error_array())){
                    $this->responseError(102, $this->form_validation->error_array());
                }else{
                    $this->responseError(4, "Required Fields are empty");
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
}
