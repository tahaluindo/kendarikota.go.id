<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pengumuman_model', 'pengumuman');
    }


    public function index()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['pengumuman'] = $this->pengumuman->get_pengumuman();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('sumber', 'Sumber', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/pengumuman/index', $data);
            $this->load->view('templates/footer');
        } else {

            $str = strtolower($this->input->post('judul', TRUE));
            $slug = str_replace(" ", "-", $str);
            $slug = str_replace(",", "", $slug);
            $slug = str_replace("/", "-", $slug);

            $data = [

                'judul' => $this->input->post('judul', TRUE),
                'slug' => $slug,
                'isi' => $this->input->post('isi', TRUE),
                'sumber' => $this->input->post('sumber', TRUE)

            ];
            $this->pengumuman->simpan_pengumuman($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Berhasil ditambahkan</div>');
            redirect('admin/pengumuman/index');
        }
    }
    public function delete($id)
    {
        $this->pengumuman->hapus_pengumuman($id);
        redirect('admin/pengumuman');
    }

    public function edit_pengumuman($id)
    {
        $str = strtolower($this->input->post('judul', TRUE));
        $slug = str_replace(" ", "-", $str);
        $slug = str_replace(",", "", $slug);
        $slug = str_replace("/", "-", $slug);

        $data = [

            'judul' => $this->input->post('judul', TRUE),
            'slug' => $slug,
            'isi' => $this->input->post('isi', TRUE),
            'sumber' => $this->input->post('sumber', TRUE)
        ];

        $this->pengumuman->edit_pengumuman($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Berhasil diedit</div>');
        redirect('admin/pengumuman');
    }
}
