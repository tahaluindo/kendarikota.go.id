<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Opd_model', 'opd');
    }


    public function index()
    {
        $data['title'] = 'Opd';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['opd'] = $this->opd->get_opd();
        $data['kategori'] = array("Sekretariat Daerah", "Badan", "Bagian", "Dinas", "Inspektorat", "Perusahaan Daerah", "BUMD", "Kecamatan");
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('nama_opd', 'Nama OPD', 'required');
        $this->form_validation->set_rules('struktur', 'Struktur', 'required');
        $this->form_validation->set_rules('tupoksi', 'Tupoksi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/opd/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'nama_opd' => $this->input->post('nama_opd', TRUE),
                'struktur' => $this->input->post('struktur', TRUE),
                'tupoksi' => $this->input->post('tupoksi', TRUE),
                'kategori' => $this->input->post('kategori', TRUE)

            ];
            $this->opd->simpan_opd($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">OPD Berhasil ditambahkan</div>');
            redirect('admin/opd/index');
        }
    }
    public function delete($id)
    {
        $this->opd->hapus_opd($id);
        redirect('admin/opd');
    }

    public function edit_opd($id)
    {
        $data = [

            'nama_opd' => $this->input->post('nama_opd', TRUE),
            'struktur' => $this->input->post('struktur', TRUE),
            'tupoksi' => $this->input->post('tupoksi', TRUE),
            'kategori' => $this->input->post('kategori', TRUE)
        ];

        $this->opd->edit_opd($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">OPD Berhasil Diedit</div>');
        redirect('admin/opd');
    }
}
