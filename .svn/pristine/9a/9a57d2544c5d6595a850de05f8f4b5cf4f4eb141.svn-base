<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_action_log
 *
 * @author johnenrick
 */
class M_action_log extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "action_log";
    }
    public function createActionLog($accountID, $APIControllerID, $accessNumberID, $detail){
        $newData = array(
            "account_ID" => $accountID,
            "api_controller_ID" => $APIControllerID,
            "access_number_ID" => $accessNumberID,
            "detail" => $detail,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveActionLog($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $selectedColumn = array(
            
        );
        $joinedTable = array(
            
        );
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
//    public function updateActionLog($ID = NULL, $condition = array(), $newData = array()) {
//        return $this->updateTableEntry($ID, $condition, $newData);
//    }
//    public function deleteActionLog($ID = NULL, $condition = array()){
//        return $this->deleteTableEntry($ID, $condition);
//    }
}
