<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url_helper','html_helper', 'form'));
        $this->load->library(array('session','form_validation'));
        $this->load->database();
    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->content = 'pages/home'; // passing middle to function. change this for different views.
        $this->contactForm();
    }

    function maintenance() {
        $this->output->set_status_header('503');
        $this->load->view('maintenance_view');
    }

    public function contactForm(){
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE)
        {   //validation fails
            $this->content='pages/home';
            $this->layout();
        }
        else
        {
            //insert the contact form data into database
            $data = array(
                'subscribed' => true,
                'subscriber_email' => $this->input->post('email')
            );

            if ($this->db->insert('email_subscribers', $data))
            {
                // success
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You\'ve stepped into the ring.</div>');
                redirect('/');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Some Error.  Please try again later!!!</div>');
                redirect('/');
            }
        }
    }

    //custom callback to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
