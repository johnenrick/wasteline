<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_waste_category extends API_Controller {
    /*
     * Access Control List
     * 1    - createWasteCategory
     * 2    - retrieveWasteCategory
     * 4    - updateWasteCategory
     * 8    - deleteWasteCategory
     * 16   - batchCreateWasteCategory
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_waste_category");
        $this->APICONTROLLERID = 1;
    }
    public function createWasteCategory(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('description', 'Description', 'required');
            
            if($this->form_validation->run()){
                $result = $this->m_waste_category->createWasteCategory(
                        $this->input->post("description")
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
    public function retrieveWasteCategory(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_waste_category->retrieveWasteCategory(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_waste_category->retrieveWasteCategory(
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
    public function updateWasteCategory(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_waste_category->updateWasteCategory(
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
    public function deleteWasteCategory(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_waste_category->deleteWasteCategory(
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
