<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Remove_blog extends CI_Migration {

    public function up()
    {
        $this->dbforge->drop_table('blog');
        $this->dbforge->drop_table('news');
    }

    public function down()
    {
//        $this->dbforge->drop_table('blog');
    }
}