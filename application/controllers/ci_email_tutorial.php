<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');

class CI_Email_Tutorial extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('encrypt');
    }
    // Show email page
    public function index() {
        $this->load->view('view_form');
    }

    // Send Gmail to another user
    public function Send_Mail() {
        
        // Check for validation
        $this->form_validation->set_rules('user_email', 'User Email', 'trim|required|xss_clean');
       // $this->form_validation->set_rules('user_password', 'User Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('to_email', 'To', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('view_form');
        } else {
            
            // Storing submitted values
            $sender_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            $receiver_email = $this->input->post('to_email');
            $position = $this->input->post('position');
            $subject = $this->input->post('subject');
			 $fname = $this->input->post('full_name');
            $message = $this->input->post('message');
			$msg=  " Email:$sender_email <br>
			         



                 
			";
            
            // Configure email library
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'brighter2crystal@gmail.com';
            $config['smtp_pass'] = 'administrator7#';

            // Load email library and passing configured values to email library 
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            // Sender email address
            $this->email->from('workshops@csr-in-action.org', $username);
            // Receiver email address
            $this->email->to($receiver_email);
            // Subject of email
            $this->email->subject($subject);
            // Message in email
            $this->email->message($message);

            if ($this->email->send()) {
                $data['message_display'] = 'Email Successfully Send !';
            } else {
                $data['message_display'] = '<p class="error_msg">Invalid Gmail Account or Password !</p>';
            }
            $this->load->view('view_form', $data);
        }
    }

}

?>

