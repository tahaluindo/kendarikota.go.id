<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('parser');
        $this->load->model('News_model', 'news');
        $this->load->model('Aplikasi_model', 'aplikasi');
        $this->load->model('Agenda_model', 'agenda');
        $this->load->model('Pengumuman_model', 'pengumuman');
        $this->load->model('Download_model', 'download');
    }

    public function index()
    {
        $data['title'] = "belajar parser template";
        $data['aplikasi'] = $this->aplikasi->get_aplikasi();
        $data['news'] = $this->news->getPosts();
        $this->parser->parse('balad/coba', $data);
    }
}
