<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kepaladaerah_model', 'kepaladaerah');
        $this->load->model('Page_model', 'page');
        $this->load->model('Pengumuman_model', 'pengumuman');
        $this->load->model('Direktori_model', 'direktori');
    }

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . '/views/anoalinux/page/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);
        $data['walikota'] = $this->kepaladaerah->get_kepaladaerah(1);
        $data['wakil'] = $this->kepaladaerah->get_kepaladaerah(2);
        $data['menupage'] = $this->page->get_page();
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/page/' . $page, $data);
    }
    
    public function detail($slug)
    {
        $data['title'] = 'Halaman';
        //$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['page'] = $this->page->detail_page($slug);
        $data['title'] = $data['page']['judul'];
        $data['menupage'] = $this->page->get_page();
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/v_page', $data);
    }
    public function pengumuman($slug = false)
    
    {
        if ($slug == false) {
            $data['pengumuman'] = $this->pengumuman->get_pengumuman();
            $data['title'] = "Pengumuman";
            $data['menupage'] = $this->page->get_page();
            $data['menu'] = $this->direktori->get_direktori();
            $this->load->view('anoalinux/v_pengumuman', $data);
        } else {
            $data['pengumuman'] = $this->pengumuman->get_pengumuman($slug);
            $data['title'] = $data['pengumuman']['judul'];
            $data['menupage'] = $this->page->get_page();
            $data['menu'] = $this->direktori->get_direktori();
            $this->load->view('anoalinux/v_detailpengumuman', $data);
        }
    }
}
