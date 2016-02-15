<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_map_marker
 *
 * @author johnenrick
 */
class M_map_marker extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "map_marker";
    }
    public function createMapMarker($associatedID, $mapMarkerTypeID , $longitude, $latitude){
        if($longitude !== NULL && $latitude !== NULL){
            $newData = array(
                "associated_ID" => $associatedID,
                "map_marker_type_ID" => $mapMarkerTypeID,
                "longitude" => $longitude,
                "latitude" => $latitude
            );
            return $this->createTableEntry($newData);
        }else{
            return false;
        }
    }
    public function retrieveMapMarker($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "report" => "report.ID=map_marker.associated_ID AND map_marker.map_marker_type_ID=3",
            "account_address" => "account_address.account_ID=map_marker.associated_ID AND map_marker.map_marker_type_ID=1",
            "dumping_location" => "dumping_location.ID=map_marker.associated_ID AND map_marker.map_marker_type_ID=2"
        );
        $selectedColumn = array(
            "map_marker.*",
            "account_address.description AS account_address_description",
            "dumping_location.description AS dumping_location_description"
        );
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateMapMarker($ID = NULL, $condition = array(), $newData = array()) {
        $joinedTable = array(
            "account_address" => "account_address.ID = map_marker.associated_ID"
        );
        return $this->updateTableEntry($ID, $condition, $newData, $joinedTable);
    }
    public function deleteMapMarker($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
