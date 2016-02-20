<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_map_marker extends API_Controller {
    /*
     * Access Control List
     * 1    - createMapMarker
     * 2    - retrieveMapMarker
     * 4    - updateMapMarker
     * 8    - deleteMapMarker
     * 16   - batchCreateMapMarker
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("m_map_marker");
        $this->APICONTROLLERID = 10;
    }
    public function createMapMarker(){
        $this->accessNumber = 1;
        if($this->checkACL()){
            $this->form_validation->set_rules('associated_ID', 'Associated ID', 'required');
            $this->form_validation->set_rules('map_marker_type_ID', 'Associated ID', 'required');
            $this->form_validation->set_rules('longitude', 'Longitude', 'required');
            $this->form_validation->set_rules('latitude', 'Latitude', 'required');
            
            if($this->form_validation->run()){
                $result = $this->m_map_marker->createMapMarker(
                        $this->input->post("associated_ID"),
                        $this->input->post("map_marker_type_ID"),
                        $this->input->post("longitude"),
                        $this->input->post("latitude")
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
    public function retrieveMapMarker(){
        $this->accessNumber = 2;
        if($this->checkACL()){
            $result = $this->m_map_marker->retrieveMapMarker(
                    $this->input->post("retrieve_type"),
                    $this->input->post("limit"),
                    $this->input->post("offset"), 
                    $this->input->post("sort"),
                    $this->input->post("ID"),
                    $this->input->post("condition")
                    );
            if($this->input->post("limit")){
                $this->responseResultCount($this->m_map_marker->retrieveMapMarker(
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
    public function updateMapMarker(){
        $this->accessNumber = 4;
        if($this->checkACL()){
            
            $result = $this->m_map_marker->updateMapMarker(
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
    public function deleteMapMarker(){
        $this->accessNumber = 8;
        if($this->checkACL()){
            $result = $this->m_map_marker->deleteMapMarker(
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