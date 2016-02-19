<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_account_contact_information
 *
 * @author johnenrick
 */
class M_account_contact_information extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account_contact_information";
    }
    public function createAccountContactInformation($accountID, $type, $detail){
        $newData = array(
            "account_ID" => $accountID,
            "account_contact_information_type_ID" => $type,
            "detail" => $detail
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccountContactInformation($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "account_contact_information.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateAccountContactInformation($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccountContactInformation($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
    public function batchUpdateAccountContactInformation($condition, $newData) {
        return $this->batchUpdateTableEntry($condition, $newData);
    }
}
