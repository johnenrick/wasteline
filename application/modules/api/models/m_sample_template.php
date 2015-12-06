<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_sample_template
 *
 * @author johnenrick
 */
class M_sample_template extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "sample_template";
    }
    public function createSampleTemplate($firstParameter){
        $newData = array(
            "first_parameter" => $firstParameter
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveSampleTemplate($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "sample_template.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateSampleTemplate($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteSampleTemplate($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
