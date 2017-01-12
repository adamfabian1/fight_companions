<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Modify_email_signup extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_column('email_subscribers','subscribed');
        $fields = array('subscribed' => array('type' => 'TINYINT', 'after' => 'subscriber_email'));
        $this->dbforge->add_column('email_subscribers', $fields);
    }

}