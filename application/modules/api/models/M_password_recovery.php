<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_password_recovery
 *
 * @author johnenrick
 */
class M_password_recovery extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "password_recovery";
    }
    public function createPasswordRecovery($accountID, $datetime){
        $newData = array(
            "account_ID" => $accountID,
            "status"=> 0,
            "datetime" => $datetime
        );
        return $this->createTableEntry($newData);
    }
    public function retrievePasswordRecovery($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "password_recovery.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updatePasswordRecovery($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deletePasswordRecovery($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
