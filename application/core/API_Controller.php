<?php

/* Created by John Enrick Pleños */
class API_Controller extends MX_Controller{
    /**
     *
     * @var int $APICONTROLLERID The ID of an API Controller which was indicated in the api_controller table in database
     */
    public $APICONTROLLERID = 0;
    /**
     *
     * @var int $response The response object of any API request
     */
    public $response = array(
        "data" => false,
        "error" => array()
    );
    /**
     *
     * @var int $accessNumberID The ID number set by the checkACL function
     */
    public $accessNumberID = 0;
    
    public function __construct() {
        parent::__construct();
        $this->load->model("api/m_access_control_list");
        $this->load->model("api/m_action_log");
    }
    /**
     * Add an error data in the response of the API request
     * @param int $status The status number of the error
     * @param string $message The message of the error
     */
    public function responseError($status, $message){
        /*
         * Status
         * 1-99 : Normal Error
         * 100-199 : Form Validation Error
         * 200-299 : System and Security Error
         */
        $this->response["error"][] = array("status" => $status, "message" => $message);
    }
    /**
     * Add a data to response of the API request
     * @param object $data The data to be added to the response
     */
    public function responseData($data){
        $this->response["data"] = $data;
    }
    /**
     * Add the total result count when there is no limit in the query
     * @param type $count
     */
    public function responseResultCount($count){
        $this->response["result_count"] = $count;
    }
    /**
     * Add a debugging information to the response
     * @param object $data Debugging message
     */
    public function responseDebug($data){
        $this->response["debug"][] = $data;
    }
    /**
     * Echo the response of an API request and end the process
     */
    public function outputResponse(){
        echo json_encode($this->response);
        //exit();
    }
    /**
     * Check if a user is authorize
     * 
     * @param type $accessNumber The access number of a function of an API controller
     */
    public function checkACL($requireLogin = true){
        //check module with parent
        return ($requireLogin==false) ? 1 : 1;//$this->m_access_control_list->checkGoupACL(user_id(), $this->APICONTROLLERID, $this->accessNumberID);
       
    }
    public function actionLog($detail){
        //check module with parent
        return $this->m_action_log->createActionLog(user_id(), $this->APICONTROLLERID, $this->accessNumberID, $detail);
    }
    public function printR($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
    public function is_associative(array $array) {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
    public function sendEmail($subject, $recipient, $message){
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'thesis.wasteline@gmail.com';
        $config['smtp_pass']    = 'W@5t3l1n3();';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not   
        
        $this->load->library('email');
        $this->email->initialize($config); 
        $this->email->from('thesis.wasteline@gmail.com', 'Wasteline.com');
        $this->email->to($recipient); 
        $this->email->bcc('johnenrickplenos@gmail.com'); 

        $this->email->subject($subject);
        $this->email->message($message);	

        return $this->email->send();

        //echo $this->email->print_debugger();
    }
}

