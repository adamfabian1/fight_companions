<?php
/**
 * Created by PhpStorm.
 * User: lifeo
 * Date: 1/9/2017
 * Time: 9:42 PM
 */

class Schedule extends MY_Controller {
    public function index(){
        parent::__construct();
        $this->content = 'pages/schedule'; // passing middle to function. change this for different views.
        $this->layout();
    }
}