<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Direktori_model', 'direktori');
    }


    public function index()
    {
        $data['title'] = 'Direktori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['lokasi'] = $this->direktori->get_lokasi();
        $data['direktori'] = $this->direktori->get_direktori();

        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/direktori/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'nama_lokasi' => $this->input->post('nama', TRUE),
                'alamat' => $this->input->post('alamat', TRUE),
                'telp' => $this->input->post('telp', TRUE),
                'latitude' => $this->input->post('latitude', TRUE),
                'longitude' => $this->input->post('longitude', TRUE),
                'id_direktori' => $this->input->post('id_direktori', TRUE)
            ];
            $this->direktori->simpan_lokasi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direktori ditambahkan</div>');
            redirect('admin/direktori/index');
        }
    }
    public function delete($id)
    {
        $this->direktori->hapus_lokasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lokasi Berhasil dihapus</div>');
        redirect('admin/direktori');
    }

    public function edit_lokasi($id)
    {
        $data = [

            'nama_lokasi' => $this->input->post('nama', TRUE),
            'alamat' => $this->input->post('alamat', TRUE),
            'telp' => $this->input->post('telp', TRUE),
            'latitude' => $this->input->post('latitude', TRUE),
            'longitude' => $this->input->post('longitude', TRUE),
            'id_direktori' => $this->input->post('id_direktori', TRUE)
        ];

        $this->direktori->edit_lokasi($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Lokasi Berhasil diedit</div>');
        redirect('admin/direktori');
    }
}
