<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_account_address
 *
 * @author johnenrick
 */
class M_account_address extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account_address";
    }
    public function createAccountAddress($accountID, $barangayID, $description, $status = 1){
        $newData = array(
            "account_ID" => $accountID,
            "barangay_ID" => $barangayID,
            "description" => $description,
            "status" => $status
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccountAddress($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "map_marker" => "map_marker.associated_ID=account_address.ID AND map_marker_type_ID=1"
        );
        $selectedColumn = array(
            "account_address.*",
            "map_marker.*",
            "map_marker.ID as map_marker_ID"
        );
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateAccountAddress($ID = NULL, $condition = array(), $newData = array()) {
        
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccountAddress($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
