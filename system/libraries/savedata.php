<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Email_Tutorial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('view_form');
    }
public function Send_Mail(){
    $this->form_validation->set_rules('user_email', 'User Email', 'trim|required|xss_clean');
$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|xss_clean');
$this->form_validation->set_rules('to_email', 'To', 'trim|required|xss_clean');
$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
if ($this->form_validation->run() == FALSE) {
$this->load->view('view_form');
} else {
    echo "jlkjl";
    $user_email = $this->input->post('user_email');
    $user_password = $this->input->post('user_password');
    $receiver_email = $this->input->post('to_email');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');
//    $config = Array(
//  'protocol' => 'smtp',
//  'smtp_host' => 'ssl://smtp.googlemail.com',
//  'smtp_port' => 465,
//  'smtp_user' => $user_email, // change it to yours
//  'smtp_pass' => $user_password, // change it to yours
//  'mailtype' => 'html',
//  'charset' => 'iso-8859-1',
//  'wordwrap' => TRUE
//);
    $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_user' => $user_email,
    'smtp_pass' => $user_password,
    'mailtype'  => 'html', 
    'charset'   => 'iso-8859-1'
);
     $this->email->initialize($config);
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
        
      //  $this->email->initialize($config);
       // $this->load->library('email', $config);
        //$this->email->set_newline("\r\n");
        $this->email->from($user_email); // change it to yours
        $this->email->to($receiver_email); // change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $data['message_display'] = 'Email Successfully Send !';
            } else {
           $data['message_display'] = $this->email->print_debugger();
        }
        $this->load->view('view_form', $data);
}

}
}

    ?>