<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Page_model', 'page');
    }

    public function index()
    {
        $data['title'] = 'Halaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['page'] = $this->page->get_page();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/page/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Tambah Halaman';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('judul', 'Judul Halaman', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/page/add', $data);
            $this->load->view('templates/footer');
        } else {
            $str = strtolower($this->input->post('judul'));
            $slug = str_replace(" ", "-", $str);
            $slug = str_replace(",", "", $slug);
            $slug = str_replace("/", "-", $slug);
            $status = $this->input->post('aktif', true);
            if ($status == NULL) {
                $aktif = 0;
            } else $aktif = 1;

            $data = [
                'judul' => $this->input->post('judul', true),
                'slug' => $slug,
                'isi' => $this->input->post('isi', true),
                'aktif' => $aktif,
                'date_created' => time(),
                'update_date' => time(),
                'views' => 0
            ];
            // simpan Halaman
            $this->page->addpage($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Halaman Berhasil ditambahkan</div>');
            redirect('admin/page/add');
        }
    }

    private function _uploadimage()
    {
        $str = $this->input->post('title');
        $str2 = strtolower($str);
        $slug = str_replace(" ", "-", $str2);
        $slug = str_replace(":", "", $str2);
        $slug2 = str_replace(",", "", $slug);
        $config['upload_path']          = './assets/img/news/';
        $config['allowed_types']        = 'jpeg|gif|jpg|png';
        $config['file_name']            = $slug2;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function delete()

    {
        $id = $this->uri->segment(4);
        $this->$this->page->delete_page($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Halaman Dihapus</div>');
        redirect('admin/page');
    }

    public function edit()
    {

        $data['title'] = 'Edit Halaman';
        $id = $this->uri->segment(4);
        $data['page'] = $this->page->get_page($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('judul', 'Judul Halaman', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/page/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $str = strtolower($this->input->post('judul'));
            $slug = str_replace(" ", "-", $str);
            $slug = str_replace(",", "", $slug);
            $slug = str_replace("/", "-", $slug);
            $status = $this->input->post('aktif', true);
            if ($status == NULL) {
                $aktif = 0;
            } else $aktif = 1;

            $data = [
                'judul' => $this->input->post('judul', true),
                'slug' => $slug,
                'isi' => $this->input->post('isi', true),
                'aktif' => $aktif,
                'update_date' => time()
            ];
            // Edit Halaman
            $this->page->edit_page($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Halaman Berhasil diubah</div>');
            redirect('admin/page/');
        }
    }
}
