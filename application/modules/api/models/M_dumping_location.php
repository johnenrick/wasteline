<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_dumping_location
 *
 * @author johnenrick
 */
class M_dumping_location extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "dumping_location";
    }
    public function createDumpingLocation($description, $detail){
        $newData = array(
            "description" => $description,
            "detail" => $detail
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveDumpingLocation($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "map_marker" => "map_marker.associated_ID=dumping_location.ID AND map_marker.map_marker_type_ID=2"
        );
        $selectedColumn = array(
            "dumping_location.*",
            "map_marker.*, map_marker.ID AS map_marker_ID"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateDumpingLocation($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteDumpingLocation($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
