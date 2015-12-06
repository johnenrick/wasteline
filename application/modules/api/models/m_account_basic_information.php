<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_account_basic_information
 *
 * @author johnenrick
 */
class M_account_basic_information extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account_basic_information";
    }
    public function createAccountBasicInformation($accountID, $firstName, $middleName, $lastName, $address){
        $newData = array(
            "account_ID" => $accountID,
            "first_name" => $firstName,
            "middle_name" => $middleName,
            "last_name" => $lastName,
            "address" => $address
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccountBasicInformation($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "account" => "account.ID=account_basic_information.account_ID"
        );
        $selectedColumn = array(
            "account.username",
            "account.account_type_ID"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateAccountBasicInformation($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccountBasicInformation($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
