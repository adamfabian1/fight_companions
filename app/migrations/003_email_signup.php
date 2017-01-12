<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Email_signup extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'entity_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'subscriber_email' => array(
                'type' => 'VARCHAR',
                'constraint' => '150',
            ),
            'subscribed' => array(
                'type' => 'BIT',
            ),
        ));
        $this->dbforge->add_key('entity_id', TRUE);
        $this->dbforge->create_table('email_subscribers');
    }

    public function down()
    {
        $this->dbforge->drop_table('email_subscribers');
    }
}