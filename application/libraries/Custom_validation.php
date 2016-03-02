<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Custom_validation
 *
 * @author johnenrick
 */
class Custom_validation extends CI_Form_validation{
    public $CI;
    function __construct() {
        parent::__construct();
                // reference to the CodeIgniter super object
        $this->CI =& get_instance();
    }
    
}
