<?php
/**
 * Created by PhpStorm.
 * User: lifeo
 * Date: 1/9/2017
 * Time: 9:07 PM
 */

class Blog extends MY_Controller {

    var $title = 'Blog';

    public function index(){
        parent::__construct();
        $this->content = 'pages/blog'; // passing middle to function. change this for different views.
        $this->layout();
    }
}