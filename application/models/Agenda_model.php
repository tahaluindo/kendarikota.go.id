<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda_model extends CI_Model
{

    public function get_agenda()
    {
        $this->db->select('agenda.*');
        $this->db->from('agenda');
        $this->db->order_by('id_agenda', 'desc');
        //$this->db->limit(4);
        return $this->db->get()->result_array();
    }
    public function simpan_agenda($data)
    {
        $this->db->insert('agenda', $data);
    }

    public function edit_agenda($data, $id)
    {
        $this->db->where('id_agenda', $id);
        $this->db->update('agenda', $data);
    }

    public function hapus_agenda($id)
    {
        return $this->db->delete('agenda', array('id_agenda' => $id));
    }
}
