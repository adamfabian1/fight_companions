<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('sendEmail')){
    function sendEmail($email, $subject, $message){
        $emailConfig = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@fightcompanions.com',
            'smtp_pass' => 'Chalupa5!',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        ];

        $from = [
            'email' => 'info@fightcompanions.com',
            'name' => "Fight Companions"
        ];

        $to = array($email);
        //  $message = 'Type your gmail message here'; // use this line to send text email.
        // load view file called "welcome_message" in to a $message variable as a html string.
        $this->load->library('email', $emailConfig);
        // Sometimes you have to set the new line character for better result
        $this->email->set_newline("\r\n");
        // Set email preferences
        $this->email->from($from['email'], $from['name']);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        // Ready to send email and check whether the email was successfully sent
        if (!$this->email->send()) {
            // Raise error message
            show_error($this->email->print_debugger());
        } else {
            // Show success notification or other things here
            echo 'Success to send email';
        }
    }
}