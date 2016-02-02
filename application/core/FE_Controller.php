<?php

/* Created by John Enrick Pleños */
class FE_Controller extends API_Controller{
    public function __construct() {
        parent::__construct();
        //$this->load->model("api/m_account");
        //$this->load->model("api/m_change_log");
        //sleep(5);
    }
    public function loadPage($bodyLink, $bodyScriptLink = false, $data = array(), $loadPage = true){
        
//        if($loadPage){
//            $this->load->view("system_application/page_head");
//        }
//        if(user_id() && $loadPage){
//            $this->load->view("system_application/page_header");
//        }
        $this->load->view($bodyLink);
//        if($loadPage){
//            $this->load->view("system_application/system");
//            $this->load->view("system_application/system_script");
//        }
        if($bodyScriptLink){
            if(is_array($bodyScriptLink)){
                foreach($bodyScriptLink as $value){
                    $this->load->view($value);
                }
            }else{
                $this->load->view($bodyScriptLink);
            }
        }
//        if(user_id() && $loadPage){
//            $this->load->view("system_application/page_footer");
//        }
//        if($loadPage){
//            $this->load->view("system_application/page_header_script", $data);
//        }
    }
    public function loadModule(){
        
    }
    public function generateResponse($data = false, $error = array()){
        return array(
            "data" => $data,
            "error" => $error
        );
    }
    public function retrieveModuleLinks(){
        $response = $this->generateResponse();
        if(user_id()){
        //Student Account Management
        $response["header"] = array(

        );
        //Section Management

        }else{
            $response["error"][] = array("status" => 1, "error" => "Not Authorized");
        }

        echo json_encode($response);
    }

}

