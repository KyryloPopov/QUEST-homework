<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{

    public function getConferences()
    {
        $result = $this->db->table('SELECT * FROM conferences ORDER BY id DESC');
        return $result;
    }
}
