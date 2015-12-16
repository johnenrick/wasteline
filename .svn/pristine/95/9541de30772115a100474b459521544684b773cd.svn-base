<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_waste_post_type
 *
 * @author johnenrick
 */
class M_waste_post_type extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "waste_post_type";
    }
    public function createWastePostType($description){
        $newData = array(
            "description" => $description
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveWastePostType($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "waste_post_type.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateWastePostType($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteWastePostType($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
