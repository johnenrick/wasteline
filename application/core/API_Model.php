<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API_Model
 *
 * @author johnenrick
 */
class API_Model extends CI_Model{
    public $TABLE = false;
    public function createTableEntry($newData){
        $this->db->start_cache();
        $this->db->flush_cache();
        $this->db->insert($this->TABLE, $newData);
        $result = $this->db->insert_id();
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    /**
     * Retrieve Entry from the table
     * @param int   $retrieveType   0 to retrieve the result, 1 to count the result
     * @param int   $limit          Set the number of entry to be retrieved
     * @param int   $offset         Set an offset where to start retrieving the data
     * @param array $sort           Sort the entry by the array key with the array value. The left side of __[double underscore] is the table and the right side is the column. \nexample:  [database_table__table_column] => "asc" 
     * @param int   $ID             If specified, it will ignore the condition parameter and return only one entry in associative array
     * @param array $condition      Filter the entry base on different conditions. __[double_underscore] separates two to three segment of the array key.
     *                              ConditionType can be like, or, not, if not specified it will be equal.
     *                              e.g. [condition_type__database_table__table_column], [condition_type__table_column], [database_table__table_column]
     * @param array $selectedColumn Specify the columns to retrieve. All columns in default table is selected and prioritized
     */
    public function retrieveTableEntry($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = array(), $selectedColumn = array(), $joinedTable = array()){
        $this->db->start_cache();
        $this->db->flush_cache();
        //Select column
        if(is_array($selectedColumn)){
        $selectedQuery = "";
            foreach($selectedColumn as $key => $column){
                $selectedQuery.=" $column";
                if(count($selectedColumn)-1 !== $key){
                    $selectedQuery.=",";
                }
            }
            $this->db->select($selectedQuery);
        }
        //joining table
        foreach($joinedTable as $key => $value){
            $this->db->join($key, $value, "left");
        }
        
        //Filtering entry
        if($ID === NULL){
            $this->addCondition($condition);
        }else{
            $this->db->where("$this->TABLE.ID", $ID);
        }
        //Sorting entry
        if(is_array($sort)){
            foreach($sort as $key => $value){
                $this->db->order_by(str_replace("__", ".",$key), ($value == "asc") ? "asc" : "desc");
            }
        }
        //limits and offset
        if($limit !== NULL){
            $this->db->limit($limit, $offset);
        }
        //($limit)?$this->db->limit($limit, $offset):0;
        if(!($retrieveType)){
            $result = $this->db->get($this->TABLE);
            $this->db->flush_cache();
            $this->db->stop_cache();
            if($result->num_rows()){
                return ($ID !== NULL) ? $result->row_array() : $result->result_array();
            }else{
                return false;
            }
            
        }else{
            $result = $this->db->count_all_results($this->TABLE);
            $this->db->flush_cache();
            $this->db->stop_cache();
            return $result;
        }
    }
    /**
     * 
     * @param type $ID          ID of the entry to be deleted. Ignore the condition parameter
     * @param type $condition   Filter the entry base on different conditions. __[double_underscore] separates two to three segment of the array key.
     *                          ConditionType can be like, or, not, if not specified it will be equal.
     *                          e.g. [condition_type__database_table__table_column], [condition_type__table_column], [database_table__table_column]
     * @param type $newData     Updated data
     * @return int
     */
    public function updateTableEntry($ID = NULL, $condition = array(), $newData = array()){
        $this->db->start_cache();
        $this->db->flush_cache();
        
        $this->addCondition($condition);
        $this->db->where("$this->TABLE.ID", $ID);
        $result = false;
        if(count($condition) > 0){
            if(count($newData) > 0){
                $result = $this->db->update($this->TABLE, $newData);
            }
        }
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function addCondition($condition = array()){
        if(is_array($condition)){
            
            foreach($condition as $key => $value){
                $segment = explode("__", $key);
                $tableColumn = $segment[count($segment)-1];
                switch($segment[0]){
                    case "like":
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->like("$tableName.$tableColumn", $value);
                        break;
                    case "not" :
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->where("$tableName.$tableColumn!=", $value);
                        break;
                    case "or" :
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->or_where("$tableName.$tableColumn", $value);
                        break;
                    case "lesser":
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->where("$tableName.$tableColumn<", $value);
                        break;
                    case "lesser_equal":
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->where("$tableName.$tableColumn<=", $value);
                        break;
                    case "greater_equal":
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->where("$tableName.$tableColumn>=", $value);
                        break;
                    case "greater":
                        $tableName = (count($segment) === 3) ? $segment[1] : $this->TABLE;
                        $this->db->where("$tableName.$tableColumn>", $value);
                        break;
                    default :
                        $tableName = (count($segment) === 2) ? $segment[0] : $this->TABLE;
                        if(is_array($value)){
                            $this->db->where_in("$tableName.$tableColumn", $value);
                        }else{
                            $this->db->where("$tableName.$tableColumn", $value);
                        }
                        break;
                }
            }
        }
    }
    public function deleteTableEntry($ID = NULL, $condition = array()){
        $this->db->start_cache();
        $this->db->flush_cache();
        if($ID === NULL){
            $this->addCondition($condition);
        }else{
            $this->db->where("$this->TABLE.ID", $ID);
        }
        $result = $this->db->delete("$this->TABLE");
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function batchCreateTableEntry($sampleTemplate){
        $this->db->start_cache();
        $this->db->flush_cache();
        $result = false;
        if(count($sampleTemplate) > 0){
            $this->db->insert_batch("$this->TABLE", $sampleTemplate);
            $result = $this->db->insert_id();
        }
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function batchUpdateTableEntry($sampleTemplate){
        $this->db->start_cache();
        $this->db->flush_cache();
        $result = false;
        if(count($sampleTemplate) > 0){
            $this->db->update_batch("$this->TABLE", $sampleTemplate, "ID");
            $result = true;
        }
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
    public function batchDeleteTableEntry($sampleTemplateID){
        $this->db->start_cache();
        $this->db->flush_cache();
        $this->db->where_in("ID", $sampleTemplateID);
        $result = $this->db->delete("$this->TABLE");
        $this->db->flush_cache();
        $this->db->stop_cache();
        return $result;
    }
}
