<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepaladaerah_model extends CI_Model
{

    public function get_Kepaladaerah($id = false)
    {
        $this->db->select('kepala_daerah.*');
        $this->db->from('kepala_daerah');

        if ($id == false) {

            $this->db->order_by('kepala_daerah.id', 'asc');
            return $this->db->get()->result_array();
        } else {
            $this->db->where("kepala_daerah.id", $id);
            return $this->db->get()->row_array();
        }
        return $this->db->get()->result_array();
    }

    public function simpan_kepaladaerah($data)
    {
        $this->db->insert('kepala_daerah', $data);
    }

    public function edit_kepaladaerah($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('kepala_daerah', $data);
    }

    public function hapus_kepaladaerah($id)
    {
        return $this->db->delete('kepala_daerah', array('id' => $id));
    }

    public function get_allpejabat($limit, $start)
    {
        $this->db->select('pejabat.*,opd.nama_opd');
        $this->db->from('pejabat');
        $this->db->join('opd', 'opd.id_opd = pejabat.id_opd', 'left');
        $this->db->limit($limit);
        $this->db->offset($start);
        $this->db->order_by('pejabat.id_pejabat', 'asc');
        return $this->db->get()->result_array();
    }
}
