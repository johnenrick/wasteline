<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_information extends API_Controller {
    /*
     * Access Control List
     * 1    - createInformation
     * 2    - retrieveInformation
     * 4    - updateInformation
     * 8    - deleteInformation
     * 16   - batchCreateInformation
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_information");
        $this->APICONTROLLERID = 4;
    }
    public function createInformation(){
        $this->accessNumber = 1;
        if($this->checkACL() && user_type() === 3){
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('source', 'Source', 'required');
            $this->form_validation->set_rules('type_ID', 'Type', 'required');
            
            if($this->form_validation->run()){
                $result = $this->m_information->createInformation(
                        $this->input->post("description"),
                        1,
                        $this->input->post("source"),
                        $this->input->post("type_ID"),
                        $this->input->post("detail")
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
    public function retrieveInformation(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_information->retrieveInformation(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_information->retrieveInformation(
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
    public function updateInformation(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            $this->form_validation->set_rules('ID', 'ID', 'required');
            if($this->form_validation->run()){
                $condition = $this->input->post("condition");
                $result = $this->m_information->updateInformation(
                        $this->input->post("ID"),
                        $condition,
                        $this->input->post("updated_data")
                        );
                if($result){
                    $this->actionLog(json_encode($this->input->post()));
                    $this->responseData($result);
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
    public function deleteInformation(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_information->deleteInformation(
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
