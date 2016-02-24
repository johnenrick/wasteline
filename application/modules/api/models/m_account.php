<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of m_account
 *
 * @author johnenrick
 */
class M_account extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "account";
    }
    public function createAccount($username, $password, $accountTypeID, $status = 2){
        $newData = array(
            "username" => $username,
            "password" => sha1($password),
            "account_type_ID" => $accountTypeID,
            "status" => $status
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveAccount($retrieveType = 0, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = array()) {
        
        $joinedTable = array(
            "account_basic_information" => "account_basic_information.account_ID=account.ID",
            "account_type" => "account_type.ID=account.account_type_ID",
            "account_contact_information AS email" => "email.account_ID=account.ID AND email.account_contact_information_type_ID=1",
            "account_contact_information AS contact_number" => "contact_number.account_ID=account.ID AND contact_number.account_contact_information_type_ID=3",
            //account address
            "account_address" => "account_address.account_ID=account.ID",
            "map_marker AS account_address_map_marker" => "account_address_map_marker.associated_ID = account_address.ID AND map_marker_type_ID = 1" 
        );
        $selectedColumn = array(
            "account.username, account.account_type_ID, account.status",
            "account_basic_information.*",
            "account_type.description AS account_type_description",
            "email.account_contact_information_type_ID AS email_type, email.detail AS email_detail, email.ID AS email_ID",
            "contact_number.account_contact_information_type_ID AS contact_number_type, contact_number.detail AS contact_number_detail, contact_number.ID AS contact_number_ID",
            "account_address.ID AS account_address_ID, account_address.description AS account_address_description",
            "account_address_map_marker.ID AS account_address_map_marker_ID, account_address_map_marker.longitude AS account_address_longitude, account_address_map_marker.latitude AS account_address_latitude"
        );
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateAccount($ID = NULL, $condition = array(), $newData = array()) {
        if(isset($newData["password"])){
            $newData["password"] = sha1($newData["password"]);
        }
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteAccount($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}