<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_waste_post
 *
 * @author johnenrick
 */
class M_waste_post extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "waste_post";
    }
    public function createWastePost($accountID, $wastePostTypeID, $wasteCategoryID, $description, $quantity, $quantityUnitID, $price, $datetime , $status = 1){
        $newData = array(
            "account_ID" => $accountID,
            "waste_post_type_ID" => $wastePostTypeID,
            "waste_category_ID" => $wasteCategoryID,
            "description" => $description,
            "quantity" => $quantity,
            "quantity_unit_ID" => $quantityUnitID,
            "price" => $price,
            "datetime" => $datetime,
            "status" => $status
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveWastePost($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            "account_basic_information" => "account_basic_information.account_ID=waste_post.account_ID",
            "unit" => "unit.ID=waste_post.quantity_unit_ID",
            "waste_category" => "waste_category.ID=waste_post.waste_category_ID",
            "waste_post_type" => "waste_post_type.ID=waste_post.waste_post_type_ID"
        );
        $selectedColumn = array(
            "waste_post.*",
            "unit.ID AS unit_ID, unit.notation AS unit_notation, unit.description AS unit_description",
            "waste_category.ID AS waste_category_ID, waste_category.description AS waste_category_description",
            "waste_post_type.ID AS waste_post_type_ID, waste_post_type.description AS waste_post_type_description"
            
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateWastePost($ID = NULL, $condition = array(), $newData = array()) {
       
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteWastePost($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
