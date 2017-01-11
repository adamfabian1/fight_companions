<?php

class MY_Controller extends CI_Controller{
    var $template = array();
    var $data = array();
    var $title = '#NEWBlood';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('html_helper');
        $this->data['title'] = $this->title;
    }

    public function layout(){
        $this->template['pageopen'] = $this->load->view('layout/pageopen', $this->data, true);
        $this->template['head'] = $this->load->view('layout/head', $this->data, true);
        $this->template['bodyopen'] = $this->load->view('layout/bodyopen', $this->data, true);
        $this->template['header'] = $this->load->view('layout/header', $this->data, true);
        $this->template['content'] = $this->load->view($this->content, $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
        $this->template['bodyclose'] = $this->load->view('layout/bodyclose', $this->data, true);
        $this->template['pageclose'] = $this->load->view('layout/pageclose', $this->data, true);
        $this->load->view('layout/index',$this->template);
    }
}