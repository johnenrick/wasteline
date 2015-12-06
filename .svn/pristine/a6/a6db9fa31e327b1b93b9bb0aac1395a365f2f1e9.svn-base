<?php

/* Created by John Enrick Pleños */

class C_access_control_list extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("api/m_access_control_list");
    }
    public function retrieveModule(){
        $response = array(
            "data" => false,
            "error" => array()
        );
        $result = $this->m_access_control_list->retrieveModule();
        if($result){
            $response["data"] = $result;
        }else{
            $response["error"][] = array("status" => 1, "message" => "No Result");
        }
        echo json_encode($result);
    }
}