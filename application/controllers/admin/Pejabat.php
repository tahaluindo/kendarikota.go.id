<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pejabat_model', 'pejabat');
        $this->load->model('Opd_model', 'opd');
    }


    public function index()
    {
        $data['title'] = 'Pejabat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pejabat'] = $this->pejabat->get_pejabat();


        $data['opd'] = $this->opd->get_opd();
        //$data['jabatan'] = array("Sekda", "Asisten I", "Asisten II", "Kepala Bagian", "Kepala Dinas", "Inspektur", "Camat");
        $data['jabatan'] = $this->pejabat->get_jabatan();


        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('nama', 'Nama Pejabat', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('body', 'Keterangan', 'required');
        //$this->form_validation->set_rules('foto', 'Foto');
        $this->form_validation->set_rules('facebook', 'Facebook');
        $this->form_validation->set_rules('twitter', 'Twitter');
        $this->form_validation->set_rules('instagram', 'Instagram');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pejabat/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nama' => $this->input->post('nama', TRUE),
                'id_opd' => $this->input->post('instansi', TRUE),
                'id_jabatan' => $this->input->post('jabatan', TRUE),
                'keterangan' => $this->input->post('body', TRUE),
                'foto' => $this->_do_upload(),
                'facebook' => $this->input->post('facebook', TRUE),
                'twitter' => $this->input->post('twitter', TRUE),
                'instagram' => $this->input->post('instagram', TRUE)

            ];

            $this->pejabat->simpan_pejabat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pejabat Berhasil ditambahkan</div>');
            redirect('admin/pejabat/index');
        }
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

    public function delete($id)
    {
        $this->pejabat->hapus_pejabat($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pejabat Berhasil Dihapus</div>');
        redirect('admin/pejabat');
    }

    public function edit_pejabat($id)
    {
        $data['pejabat'] = $this->pejabat->get_pejabat($id);
        $data = [

            'nama' => $this->input->post('nama', TRUE),
            'id_opd' => $this->input->post('instansi', TRUE),
            'id_jabatan' => $this->input->post('jabatan', TRUE),
            'keterangan' => $this->input->post('body1', TRUE),
            'facebook' => $this->input->post('facebook', TRUE),
            'twitter' => $this->input->post('twitter', TRUE),
            'instagram' => $this->input->post('instagram', TRUE)
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
                $old_image = $data['pejabat']['foto'];
                if ($old_image != "default.jpg") {

                    unlink(FCPATH . 'assets/img/pejabat/' . $old_image);
                }
                $newimage = $this->upload->data('file_name');
                $this->db->set('foto', $newimage);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->pejabat->edit_pejabat($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pejabat Berhasil Diedit</div>');
        redirect('admin/pejabat');
    }
}
