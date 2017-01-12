<?php
/**
 * Created by PhpStorm.
 * User: lifeo
 * Date: 1/9/2017
 * Time: 9:53 PM
 */

class Feedback extends MY_Controller {

    var $title = 'Feedback / Contact Us';

    public function index(){
        parent::__construct();
        $this->content = 'pages/feedback'; // passing middle to function. change this for different views.
        $this->layout();
    }
}