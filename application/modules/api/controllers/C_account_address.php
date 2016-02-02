<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_account_address extends API_Controller {
    /*
     * Access Control List
     * 1    - createAccountAddress
     * 2    - retrieveAccountAddress
     * 4    - updateAccountAddress
     * 8    - deleteAccountAddress
     * 16   - batchCreateAccountAddress
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_account_address");
        $this->APICONTROLLERID = 1;
    }
    public function createAccountAddress(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('account_ID', 'Account', 'required|test_valid');
            $this->form_validation->set_rules('barangay_ID', 'Barangay ID', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
            if($this->form_validation->run()){
                $result = $this->m_account_address->createAccountAddress(
                        $this->input->post("account_ID"),
                        $this->input->post("barangay_ID"),
                        $this->input->post("description"),
                        $this->input->post("status")
                        );
                if($result){
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
    public function testing(){
         $this->form_validation->set_rules('account_ID', 'Account', 'test_valid');
         if($this->form_validation->run()){
             echo "test";
         }else{
             print_r($this->form_validation->error_array());
         }
    }
    public function _test_valid(){
        $this->form_validation->set_message("test_valid", 'year should be greater then current year.');
        return true;
    }
    public function retrieveAccountAddress(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_account_address->retrieveAccountAddress(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_account_address->retrieveAccountAddress(
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
    public function updateAccountAddress(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            $result = $this->m_account_address->updateAccountAddress(
                    $this->input->post("ID"),
                    $this->input->post("condition"),
                    $this->input->post("updated_data")
                    );
            if($result){
                if($this->input->post("updated_data[longitude]") && $this->input->post("updated_data[latitude]")){
                    $this->load->model("M_map_marker");
                    $this->M_map_marker->updateMapMarker(NULL, $this->input->post("condition"), $this->input->post("updated_data"));
                }
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
    public function deleteAccountAddress(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_account_address->deleteAccountAddress(
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
