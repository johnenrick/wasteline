<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_information
 *
 * @author johnenrick
 */
class M_information extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "information";
    }
    public function createInformation($barangayID, $typeID, $detail){
        $newData = array(
            "barangay_ID" => $barangayID,
            "type_ID" => $typeID,
            "detail" => $detail
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveInformation($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "information_type" => "information_type.ID=information.type_ID"
        );
        $selectedColumn = array(
            "information.*",
            "information_type.description AS information_description"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateInformation($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteInformation($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
