<?php

/* Created by John Enrick Pleños */

class C_access_control_list extends API_Controller{
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
    public function retrieveAccessControlList(){
        $condition = array();
        $condition["group_ID"] = user_type()*1;
        $condition["account_ID"] = user_id()*1;
        $this->responseDebug($condition);
        $ACL = $this->m_access_control_list->retrieveAccessControlList(false, false, false, NULL, NULL, $condition);
        $groupACL = $this->m_access_control_list->retrieveGroupAccessControlList(false, false, false, NULL, NULL, $condition);
        $data = array();
        if($ACL || $groupACL){
            $data["access_control_list"] = $ACL;
            $data["group_access_control_list"] = $groupACL;
        }else{
            $this->responseError(1, "No Result");
        }
        $this->responseData($data);
        $this->outputResponse();
    }
}