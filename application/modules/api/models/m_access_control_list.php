<?php

/* Created by John Enrick Pleños */
class M_access_control_list extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "access_control_list";
    }
    public function checkACL($accountID, $apiControllerID, $accessNumber){
        $this->db->start_cache();
        $this->db->flush_cache();
        $result = $this->db->query("SELECT * FROM `module_api_controller` JOIN `access_control_list` ON `access_control_list`.`module_ID`=`module_api_controller`.`module_ID` WHERE `access_control_list`.`account_ID` = ".$accountID." AND `module_api_controller`.`api_controller_ID` = ".$apiControllerID." AND `module_api_controller`.`privilege_code` & ".$accessNumber." != 1")->result_array();
        $this->db->flush_cache();
        $this->db->stop_cache();
        if(count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
    public function checkGoupACL($accountID, $apiControllerID, $accessNumber){
        $this->db->start_cache();
        $this->db->flush_cache();
        $selectScript = "SELECT * FROM `group_access_control_list` ";
        $joinScript =  "LEFT JOIN `account` ON `account`.`ID`=".$accountID." LEFT JOIN `module_api_controller` ON `module_api_controller`.`module_ID`=`group_access_control_list`.`module_ID` AND `module_api_controller`.`api_controller_ID`=".$apiControllerID." ";
        $whereScript = "WHERE `group_access_control_list`.`group_ID`=`account`.`account_type_ID` AND ((`module_api_controller`.`privilege_code`)&".$accessNumber.") > 0";
      
        $result = $this->db->query($selectScript.$joinScript.$whereScript)->result_array();
        if(count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
    function createAccessControlList($moduleID, $accountID){
        $this->db->start_cache();
        $this->db->flush_cache();
        $data = array(
            "module_ID" => $moduleID,
            "account_ID" => $accountID
        );
        $this->db->insert("access_control_list", $data);
        $ID = $this->db->insert_id();
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $ID; 
    }
    public function retrieveAccessControlList($retrieveType = false, $limit = false, $offset = false, $sort = NULL, $ID = NULL, $condition = NULL){//$retrieveType: 1 - like, 0 - match, 3 count
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "access_control_list.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function retrieveGroupAccessControlList($retrieveType = false, $limit = false, $offset = false, $sort = NULL, $ID = NULL, $condition = NULL){
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "group_access_control_list.*"
        );
        $this->TABLE = "group_access_control_list";
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    function deleteAccessControlList($moduleID = NULL, $accountID = NULL){
        $this->db->start_cache();
        $this->db->flush_cache();
        ($moduleID != NULL) ? $this->db->where("module_ID", $moduleID) : null;
        ($accountID != NULL) ? $this->db->where("account_ID", $accountID) : null;
        $result = $this->db->delete("access_control_list");
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    function batchCreateAccessControlList($list){
        $this->db->start_cache();
        $this->db->flush_cache();
        $result = $this->db->insert_batch("access_control_list", $list);
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    function retrieveModule($ID= NULL, $parentID = NULL){
        $this->db->start_cache();
        $this->db->flush_cache();
        $this->db->select("*");
        $condition = array();
        ($ID != NULL) ? $condition["module.ID"] = $ID : null;
        ($parentID != NULL) ? $condition["module.parent_ID"] = $parentID : null;
        (count($condition) > 0) ? $this->db->where($condition) : null;
        $this->db->order_by("description", "asc");
        $result = $this->db->get("module");
        $this->db->flush_cache();
        $this->db->stop_cache();
        if($result->num_rows()){
            return ($ID != NULL) ? $result->row_array() : $result->result_array();
        }else{
            return false;
        }
    }
}

