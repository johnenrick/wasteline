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
    public function retrieveMapMarker($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL, $wastePost = NULL) {
        $joinedTable = array(
            "report" => "report.ID=map_marker.associated_ID AND map_marker.map_marker_type_ID=3",
            "account_address" => "account_address.ID=map_marker.associated_ID AND map_marker.map_marker_type_ID=1",
            "dumping_location" => "dumping_location.ID=map_marker.associated_ID AND map_marker.map_marker_type_ID=2",
            "report AS illegal_dumping" => "illegal_dumping.ID=map_marker.associated_ID AND illegal_dumping.report_type_ID=3 AND map_marker.map_marker_type_ID=3"
        );
        
        $selectedColumn = array(
            "map_marker.*",
            "account_address.description AS account_address_description",
            "dumping_location.description AS dumping_location_description",
            "illegal_dumping.detail AS illegal_dumping_detail"
        );
        if($wastePost !== NULL){
            $joinedTable["waste_post"] = "waste_post.account_ID=account_address.account_ID";
            $selectedColumn[] = "waste_post.account_ID, waste_post.waste_post_type_ID";
        }
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
