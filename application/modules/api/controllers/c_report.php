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
        $this->APICONTROLLERID = 5;
    }
    public function createReport(){
        $this->accessNumber = 1;
        if($this->checkACL() && user_id()){
            $this->form_validation->set_rules('associated_ID', 'Associated ID', 'required');
            $this->form_validation->set_rules('report_type_ID', 'Report Type', 'required');
            if($this->input->post("report_type_ID") == 3){
                $this->form_validation->set_rules('longitude', 'Longitude', 'required');
                $this->form_validation->set_rules('latitude', 'Latitude', 'required');
            }
            if($this->form_validation->run()){
                $result = $this->m_report->createReport(
                        $this->input->post("associated_ID"),
                        $this->input->post("report_type_ID"),
                        user_id(),
                        $this->input->post("detail")
                        );
                if($this->input->post("report_type_ID") == 3){
                    $this->load->model("M_map_marker");
                    $mapMarker = $this->M_map_marker->createMapMarker(
                            $result,
                            3,
                            $this->input->post("longitude"),
                            $this->input->post("latitude")
                            );
                    if(!$mapMarker){
                        $this->m_report->deleteReport(
                            $result
                        );
                        $this->responseError(5, "Coordinates required");
                        $result = false;
                    }
                }
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
    public function retrieveReport(){
        $this->accessNumber = 2;
        $condition = ($this->input->post("condition")) ? $this->input->post("condition") : array();
        if(!$this->checkACL(16)){//accessNumber 16 if not admin
            $condition["reporter_account_ID"] = user_id();
        }
        if($this->checkACL()){
            
            $result = $this->m_report->retrieveReport(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $condition
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_report->retrieveReport(
                    1,
                    NULL,
                    NULL,
                    NULL,
                    $this->input->post("ID"), 
                    $condition
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
        $condition = ($this->input->post("condition")) ? $this->input->post("condition") : array();
        if(!($this->checkACL(16))){//16 if not admin
            $condition["reporter_account_ID"] = user_id();
        }
        if($this->checkACL()){
            $result = $this->m_report->updateReport(
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
            $this->responseError(1, "Not Authorized");
        }
        $this->outputResponse();
    }
        public function deleteReport(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $condition = $this->input->post("condition");
            if(!$this->checkACL(16)){
                $condition["reporter_account_ID"] = user_id();
            }
            $result = $this->m_report->deleteReport(
                    $this->input->post("ID"),
                    $condition
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
