<?php
/**
 * Created by PhpStorm.
 * User: lifeo
 * Date: 1/9/2017
 * Time: 9:45 PM
 */

class Merch extends MY_Controller {

    var $title = 'Merch';

    public function index(){
        parent::__construct();
        $this->content = 'pages/merch'; // passing middle to function. change this for different views.
        $this->layout();
    }
}