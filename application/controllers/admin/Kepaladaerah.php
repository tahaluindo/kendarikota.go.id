<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepaladaerah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kepaladaerah_model', 'kepaladaerah');
    }


    public function index()
    {
        $data['title'] = 'Kepala Daerah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['walikota'] = $this->kepaladaerah->get_kepaladaerah(1);
        $data['wakil'] = $this->kepaladaerah->get_kepaladaerah(2);
        $data['jabatan'] = array("WaliKota", "Wakil WaliKota");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kepaladaerah/index', $data);
        $this->load->view('templates/footer');
    }

    private function _do_upload()
    {
        $str = $this->input->post('nama');
        $str = strtolower($str);
        $slug = str_replace(" ", "-", $str);
        $slug = str_replace(".", "", $slug);
        $slug = str_replace(",", "", $slug);
        $config['upload_path']          = './assets/img/pejabat/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $slug;
        $config['overwrite']            = true;
        $config['max_size']             = 1024;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            //$error = array('error' => $this->upload->display_errors());
            return "default.jpg";

            //$this->load->view('admin/upload_form', $error);
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function edit_kepaladaerah($id)
    {
        $data['kepaladaerah'] = $this->kepaladaerah->get_kepaladaerah();

        $data = [

            'nama' => $this->input->post('nama', TRUE),
            'profil' => $this->input->post('profil', TRUE)
        ];
        $str = $this->input->post('nama');
        $str = strtolower($str);
        $slug = str_replace(" ", "-", $str);
        $slug = str_replace(".", "", $slug);
        $slug = str_replace(",", "", $slug);

        $upload_image = $_FILES['foto']['name'];
        if ($upload_image) {
            $config['upload_path']          = './assets/img/pejabat/';
            $config['allowed_types']        = 'jpeg|gif|jpg|png|JPG';
            $config['file_name']            = $slug;
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {

                $old_image = $data['kepaladaerah']['foto'];
                if ($old_image != "default.jpg") {

                    unlink(FCPATH . 'assets/img/pejabat/' . $old_image);
                }
                $newimage = $this->upload->data('file_name');
                $this->db->set('foto', $newimage);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->kepaladaerah->edit_kepaladaerah($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kepala Daerah Berhasil Diedit</div>');
        redirect('admin/kepaladaerah');
    }
}
