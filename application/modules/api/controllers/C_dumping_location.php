<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dumping_location extends API_Controller {
    /*
     * Access Control List
     * 1    - createDumpingLocation
     * 2    - retrieveDumpingLocation
     * 4    - updateDumpingLocation
     * 8    - deleteDumpingLocation
     * 16   - batchCreateDumpingLocation
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_dumping_location");
        $this->APICONTROLLERID = 3;
    }
    public function createDumpingLocation(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('description', 'Description', 'required|strip_tags');
            $this->form_validation->set_rules('detail', 'Detail', 'required|strip_tags');
            $this->form_validation->set_rules('longitude', 'Longitude', 'required');
            $this->form_validation->set_rules('latitude', 'Latitude', 'required');
            
            
            if($this->form_validation->run()){
                $result = $this->m_dumping_location->createDumpingLocation(
                        $this->input->post("description"),
                        $this->input->post("detail")
                        );
                if($result){
                    $this->load->model("M_map_marker");
                    $this->M_map_marker->createMapMarker($result, 2 , $this->input->post("longitude"), $this->input->post("latitude"));
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
    public function retrieveDumpingLocation(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_dumping_location->retrieveDumpingLocation(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"), 
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_dumping_location->retrieveDumpingLocation(
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
    public function updateDumpingLocation(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            $updatedData = $this->input->post("updated_data");
            $result = $this->m_dumping_location->updateDumpingLocation(
                    $this->input->post("ID"),
                    $this->input->post("condition"),
                    $updatedData
                    );
            if($result){
                if($this->input->post("ID") && isset($updatedData["longitude"]) && isset($updatedData["latitude"])){
                    $this->load->model("M_map_marker");
                    $this->M_map_marker->updateMapMarker(
                            NULL, 
                            array(
                                "associated_ID" => $this->input->post("ID"),
                                "map_marker_type_ID" => 2
                            ), 
                            $updatedData
                            );
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
    public function deleteDumpingLocation(){
        $this->accessNumber = 8;
        if($this->checkACL() && user_type() == 3){
            $result = $this->m_dumping_location->deleteDumpingLocation(
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
