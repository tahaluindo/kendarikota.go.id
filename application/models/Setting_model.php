<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    public function option()
    {
        return $this->db->get('setting')->row_array();
    }
    public function update($data)
    {
        $this->db->update('setting', $data);
    }
}
