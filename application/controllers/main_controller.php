<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
     $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
   }

   public function index() 
   { 
        $this->load->view('form');
    } 
}

?>

