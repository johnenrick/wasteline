<?php

class Template extends API_Controller{
    public function index(){
        $this->load->view('design_1');
    }
    public function design(){
        $this->load->view('design_2');
    }
    public function landing(){
        $this->load->view('design_4');
    }
    public function map(){
        $this->load->view('map');
    }
}
