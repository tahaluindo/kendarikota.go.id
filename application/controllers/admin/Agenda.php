<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Agenda_model', 'agenda');
    }


    public function index()
    {
        $data['title'] = 'Agenda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['agenda'] = $this->agenda->get_agenda();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('tgl', 'Tgl', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/agenda/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'nama' => $this->input->post('nama', TRUE),
                'deskripsi' => $this->input->post('deskripsi', TRUE),
                'tgl_mulai' => date($this->input->post('tgl', TRUE)),
                'lokasi' => $this->input->post('lokasi', TRUE)
            ];
            $this->agenda->simpan_agenda($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda ditambahkan</div>');
            redirect('admin/agenda/index');
        }
    }
    public function delete($id)
    {
        $this->agenda->hapus_agenda($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda Dihapus</div>');
        redirect('admin/agenda');
    }

    public function edit_agenda($id)
    {
        $data = [

            'nama' => $this->input->post('nama', TRUE),
            'deskripsi' => $this->input->post('deskripsi', TRUE),
            'tgl_mulai' => date($this->input->post('tgl', TRUE)),
            'lokasi' => $this->input->post('lokasi', TRUE)
        ];

        $this->agenda->edit_agenda($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Agenda Berhasil Diedit</div>');
        redirect('admin/agenda');
    }
}
