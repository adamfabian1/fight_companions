<?php
/**
 * Created by PhpStorm.
 * User: lifeo
 * Date: 1/9/2017
 * Time: 9:45 PM
 */

class Unsubscribe extends MY_Controller {

    var $title = 'Unsubscribe';

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
        $this->content = 'pages/unsubscribe';
        $this->layout();
    }

    public function unsubscribe()
    {
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE)
        {
            echo validation_errors();
        }
        else
        {
            $sql = "SELECT * FROM email_subscribers WHERE subscriber_email = '".$this->input->post('email') ."'";
            $query = $this->db->query($sql);
            if(count($query->result()) < 1)
            {
                echo 'The email '.$this->input->post('email').' is not subscribed.';
            }
            else{
                $query = $this->db->delete('email_subscribers', array('subscriber_email'=> $this->input->post('email')));
                if($this->db->affected_rows() == 1)
                {
                    echo 'Fine, bitch.  Leave.';
                }
            }
        }
    }
}