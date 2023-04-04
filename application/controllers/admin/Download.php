<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Download_model', 'download');
    }


    public function index()
    {
        $data['title'] = 'Download';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['download'] = $this->download->get_file();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('file', 'File', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/download/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'judul_file' => $this->input->post('judul', TRUE),
                'deskripsi_file' => $this->input->post('deskripsi', TRUE),
                'data_file' => $this->input->post('file', TRUE)

            ];
            $this->download->simpan_file($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">File ditambahkan</div>');
            redirect('admin/download/index');
        }
    }
    public function delete($id)
    {
        $this->download->hapus_file($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Dihapus</div>');
        redirect('admin/download');
    }

    public function edit_file($id)
    {
        $data = [

            'judul_file' => $this->input->post('judul', TRUE),
            'deskripsi_file' => $this->input->post('deskripsi', TRUE),
            'data_file' => $this->input->post('file', TRUE)
        ];

        $this->download->edit_file($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Diedit</div>');
        redirect('admin/download');
    }
}
