<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aplikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('aplikasi_model', 'aplikasi');
    }


    public function index()
    {
        $data['title'] = 'Aplikasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['aplikasi'] = $this->aplikasi->get_aplikasi();
        // $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        //$this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('link', 'link', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/aplikasi/index', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [

                'nama_aplikasi' => $this->input->post('nama', TRUE),
                //'icon' => $this->input->post('icon', TRUE),
                'link_aplikasi' => $this->input->post('link', TRUE)
            ];

            $upload_image = $_FILES['icon']['name'];

            if ($upload_image) {
                $config['upload_path']          = './assets/anoalinux/images/';
                $config['allowed_types']        = 'jpeg|gif|jpg|png|JPG';
                //$config['file_name']            = $slug;
                $config['max_size']             = 2048;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('icon')) {

                    if ($old_image != "default.jpg") {
                        $old_image = $data['aplikasi']['icon'];
                        unlink(FCPATH . 'assets/anoalinux/images/' . $old_image);
                    }
                    $newimage = $this->upload->data('file_name');
                    $this->db->set('icon', $newimage);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->aplikasi->simpan_aplikasi($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aplikasi ditambahkan</div>');
            redirect('admin/aplikasi/index');
        }
    }
    public function delete($id)
    {
        $this->aplikasi->hapus_aplikasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aplikasi Berhasil Dihapus</div>');
        redirect('/admin/aplikasi');
    }

    public function edit_aplikasi($id)
    {
        $data = [

            'nama_aplikasi' => $this->input->post('nama', TRUE),
            //'icon' => $this->input->post('icon', TRUE),
            'link_aplikasi' => $this->input->post('link', TRUE)
        ];

        $upload_image = $_FILES['icon']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/anoalinux/images/';
            $config['allowed_types']        = 'jpeg|gif|jpg|png|JPG';
            //$config['file_name']            = $slug;
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('icon')) {

                if ($old_image != "default.jpg") {
                    $old_image = $data['aplikasi']['icon'];
                    unlink(FCPATH . 'assets/anoalinux/images/' . $old_image);
                }
                $newimage = $this->upload->data('file_name');
                $this->db->set('icon', $newimage);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->aplikasi->edit_aplikasi($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Aplikasi Berhasil Diedit</div>');
        redirect('/admin/aplikasi');
    }
}
