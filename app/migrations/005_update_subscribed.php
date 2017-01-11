<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Update_subscribed extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_column('email_subscribers','subscribed');
        $fields = array('subscribed' => array('type' => 'TINYINT','constraint' => 1, 'after' => 'subscriber_email'));
        $this->dbforge->add_column('email_subscribers', $fields);
    }

}