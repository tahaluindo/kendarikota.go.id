<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Perda_model', 'perda');
    }


    public function index()
    {
        $data['title'] = 'Perda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['perda'] = $this->perda->get_perda();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('no_perda', 'No. Perda', 'required');
        $this->form_validation->set_rules('tentang', 'Tentang', 'required');

        $this->form_validation->set_rules('file', 'File Perda', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/perda/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'no_perda' => $this->input->post('no_perda', TRUE),
                'tentang' => $this->input->post('tentang', TRUE),
                'tgl' => time(),
                'data_file' => $this->input->post('file', TRUE)

            ];
            $this->perda->simpan_file($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Peraturan Daerah ditambahkan</div>');
            redirect('admin/perda/index');
        }
    }
    public function delete($id)
    {
        $this->perda->hapus_perda($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Perda Berhasil Dihapus</div>');
        redirect('admin/perda');
    }

    public function edit_file($id)
    {
        $data = [

            'no_perda' => $this->input->post('no_perda', TRUE),
            'tentang' => $this->input->post('tentang', TRUE),
            'data_file' => $this->input->post('file', TRUE)
        ];

        $this->perda->edit_file($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Perda Berhasil Diedit</div>');
        redirect('admin/perda');
    }
}
