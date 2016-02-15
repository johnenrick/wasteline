<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_waste_post extends API_Controller {
    /*
     * Access Control List
     * 1    - createWastePost
     * 2    - retrieveWastePost
     * 4    - updateWastePost
     * 8    - deleteWastePost
     * 16   - batchCreateWastePost
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_waste_post");
        $this->APICONTROLLERID = 7;
    }
    public function createWastePost(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('waste_post_type_ID', 'Waste Post Type ID', 'required');
            $this->form_validation->set_rules('waste_category_ID', 'Waste Post Type ID', 'required');
            $this->form_validation->set_rules('description', 'Waste Post Type ID', 'required');
            if($this->input->post("quantity")){
                $this->form_validation->set_rules('quantity_unit_ID', 'Quantity Unit ID', 'required');
            }
            if($this->form_validation->run()){
                $result = $this->m_waste_post->createWastePost(
                        user_id(),
                        $this->input->post("waste_post_type_ID"),
                        $this->input->post("waste_category_ID"),
                        $this->input->post("description"),
                        $this->input->post("quantity"),
                        $this->input->post("quantity_unit_ID"),
                        $this->input->post("price"),
                        time(),
                        1
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
    public function batchCreateWastePost(){
        $this->accessNumber = 16;
        if($this->checkACL()){
            $requiredField = array("waste_post_type_ID", "waste_category_ID", "description");
            $wastePost = $this->input->post("waste_post");
            $currentTime = time();
            foreach($wastePost as $wastePostKey => $wastePostValue){
                $wastePost[$wastePostKey]["account_ID"] = user_id();
                $wastePost[$wastePostKey]["datetime"] = $currentTime;
                $wastePost[$wastePostKey]["status"] = 1;
                if(isset($wastePostValue["quantity"])){/////Check if a value already exist
                    $requiredField[] = "quantity_unit_ID";
                }
            }
            $isValid = $this->batchValidation($wastePost, $requiredField);
            if($isValid === true){
                $result = $this->m_waste_post->batchCreateWastePost($wastePost);
                if($result){
                    $this->actionLog($result);
                    $this->responseData($result);
                }else{
                    $this->responseError(3, "Failed to create");
                }
            }else{
                $this->responseError(4, $isValid);
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function batchUpdateWastePost(){
        $this->accessNumber = 32;
        if($this->checkACL()){
            $requiredField = array("ID", "waste_post_type_ID", "waste_category_ID", "description");
;            $wastePost = $this->input->post("waste_post");
            $currentTime = time();
            foreach($wastePost as $wastePostKey => $wastePostValue){
                $wastePost[$wastePostKey]["account_ID"] = user_id();
                $wastePost[$wastePostKey]["datetime"] = $currentTime;
                $wastePost[$wastePostKey]["status"] = 1;
                if(isset($wastePostValue["quantity"])){/////Check if a value already exist
                    $requiredField[] = "quantity_unit_ID";
                }
            }
            $isValid = $this->batchValidation($wastePost, $requiredField);
            if($isValid === true){
                $result = $this->m_waste_post->batchUpdateWastePost("ID", $wastePost, array("account_ID" => user_id()));
                if($result){
                    $this->actionLog($result);
                    $this->responseData($result);
                }else{
                    $this->responseError(3, "Failed to Update");
                }
            }else{
                $this->responseError(4, $isValid);
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function batchDeleteWastePost(){
        $this->accessNumber = 64;
        if($this->checkACL()){
            if($this->input->post("ID")){
                $result = $this->m_waste_post->batchDeleteWastePost($this->input->post("ID"), array("account_ID" => user_id()));
                if($result){
                    $this->actionLog($result);
                    $this->responseData($result);
                }else{
                    $this->responseError(3, "Failed to Delete");
                }
            }else{
                $this->responseError(2, "ID is Required");
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function retrieveWastePost(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_waste_post->retrieveWastePost(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_waste_post->retrieveWastePost(
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
    public function updateWastePost(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            $condition = $this->input->post("condition");
            $updatedData = $this->input->post("updated_data");
            if(user_type() == 2){
                $condition["account_ID"] = user_id();
                $updatedData["account_ID"] = user_id();
                unset($updatedData["waste_post_type_ID"] );
            }
            $result = $this->m_waste_post->updateWastePost(
                    $this->input->post("ID"),
                    $condition,
                    $updatedData
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
    public function deleteWastePost(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_waste_post->deleteWastePost(
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
