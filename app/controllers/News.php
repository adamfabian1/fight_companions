<?php
/**
 * Created by PhpStorm.
 * User: lifeo
 * Date: 1/9/2017
 * Time: 9:45 PM
 */

class News extends MY_Controller {

    var $title = 'MMA News';

    public function index(){
        parent::__construct();
        $this->content = 'pages/news'; // passing middle to function. change this for different views.
        $this->layout();
    }
}