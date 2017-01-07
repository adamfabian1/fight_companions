<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('html_helper');
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
        $this->content = 'home'; // passing middle to function. change this for different views.
        $this->layout();
        $this->data['page-title'] = 'Welcome Home';
    }

    function maintenance() {
        $this->output->set_status_header('503');
        $this->load->view('maintenance_view');
    }
}
