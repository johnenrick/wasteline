<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_report extends API_Controller {
    /*
     * Access Control List
     * 1    - createReport
     * 2    - retrieveReport
     * 4    - updateReport
     * 8    - deleteReport
     * 16   - batchCreateReport
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_report");
        $this->APICONTROLLERID = 1;
    }
    public function createReport(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('entry_ID', 'Entry ID', 'required');
            $this->form_validation->set_rules('report_type_ID', 'First Parameter', 'required');
            $this->form_validation->set_rules('description', 'First Parameter', 'required');
            $this->form_validation->set_rules('datetime', 'First Parameter', 'required');
            
            if($this->form_validation->run()){
                $result = $this->m_report->createReport(
                        $this->input->post("entry_ID"),
                        $this->input->post("report_type_ID"),
                        $this->input->post("description"),
                        $this->input->post("datetime")
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
                    $this->responseError(4, "Required Fields are empty");
                }
            }
        }else{
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
    public function retrieveReport(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_report->retrieveReport(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_report->retrieveReport(
                    1, // 1 - search, 0 - match
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
    public function updateReport(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_report->updateReport(
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
    public function deleteReport(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_report->deleteReport(
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
