<?php

/* Created by John Enrick Pleños */
class m_access_control_list extends CI_Model{
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
        $whereScript = "WHERE `group_access_control_list`.`group_ID`=`account`.`account_type_ID` AND `module_api_controller`.`privilege_code`&".$accessNumber."=1";
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
    public function retrieveAccessControlList($retrieveType = false, $limit = false, $offset = false, $sort = NULL, $ID = NULL, $moduleID = NULL, $accountID = NULL){//$retrieveType: 1 - like, 0 - match, 3 count
        $this->db->start_cache();
        $this->db->flush_cache();
        
        $this->db->select("access_control_list.*");
        $condition = array();
        $likeCondition = array();
        
        ($ID != NULL) ? $condition["access_control_list.ID"] = $ID : null;
        ($moduleID != NULL) ? $condition["access_control_list.module_ID"] = $moduleID : null;
        ($accountID != NULL) ? $condition["access_control_list.account_ID"] = $accountID : null;
        if($sort){
            foreach($sort as $key => $value){
                $tableColumn = explode("__", $key);
                if(count($tableColumn) > 1){
                    $key = $tableColumn[0].".".$tableColumn[1];
                }
                $this->db->order_by($key, ($value) ? "asc" : "desc");
            }
        }
        (count($condition) > 0 != NULL) ? $this->db->where($condition) : null;
        (count($likeCondition) > 0) ? $this->db->like($likeCondition) : null;
        ($limit)?$this->db->limit($limit, $offset):0;
        if($retrieveType != 3){
            $result = $this->db->get("access_control_list");
            $this->db->flush_cache();
            $this->db->stop_cache();
            if($result->num_rows()){
                return ($ID && !$retrieveType) ? $result->row_array() : $result->result_array();
            }else{
                return false;
            }
        }else{
            $result = $this->db->count_all_results('access_control_list');
            $this->db->flush_cache();
            $this->db->stop_cache();
            return $result;
        }
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

