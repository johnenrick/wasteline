<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_waste_category
 *
 * @author johnenrick
 */
class M_waste_category extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "waste_category";
    }
    public function createWasteCategory($description){
        $newData = array(
            "description" => $description
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveWasteCategory($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "waste_category.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateWasteCategory($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteWasteCategory($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }

    public function retrieveUnit($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $this->TABLE = "unit";
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "unit.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
}
