<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->model('News_model', 'news');
        $this->load->model('Aplikasi_model', 'aplikasi');
        $this->load->model('Agenda_model', 'agenda');
        $this->load->model('Pengumuman_model', 'pengumuman');
        $this->load->model('Download_model', 'download');
        $this->load->model('Direktori_model', 'direktori');
        $this->load->model('perda_model', 'perda');
        $this->load->model('Opd_model', 'opd');
        $this->load->model('pejabat_model', 'pejabat');
        $this->load->model('subdomain_model', 'subdomain');
        $this->load->model('Page_model', 'page');
        $this->API = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyALdfa71Kmf-p6LgWyjPvgmtHbTLhtchq0&channelId=UCFytYxv0Xw4WnDTQUKfRQCg&maxResults=4&order=date&part=snippet";
        $this->load->library('session');
        //$this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        //$data['option'] = $this->setting->option();
        //$data['title'] = 'Detiksultra.com - Baca Detiksultra Baru Bicara';
        //$data['category'] = $this->home->getAll_Category();
        //$data['news'] = $this->home->headline();
        //$data['pilihan'] = $this->home->pilihan();
        $data['menupage'] = $this->page->get_page();
        $data['allnews'] = $this->news->getPosts();
        $data['aplikasi'] = $this->aplikasi->get_aplikasi();
        $data['agenda'] = $this->agenda->get_agenda();
        $data['pengumuman'] = $this->pengumuman->get_pengumuman();
        $data['menu'] = $this->direktori->get_direktori();
        $data['pejabat'] = $this->pejabat->get_pejabat();
        $data['youtube'] = json_decode($this->curl->simple_get($this->API), true);
        $data['subdomain'] = $this->subdomain->get_subdomain();

        // $data['politik'] = $this->home->get_All_Bycategory('politik', 1);
        //$data['metrokota'] = $this->home->get_All_Bycategory('Metro Kota', 4);
        //$data['ekobis'] = $this->home->get_All_Bycategory('ekobis', 1);
        // $data['kasus'] = $this->home->get_All_Bycategory('kasus', 5);
        // $data['tokoh'] = $this->home->get_All_Bycategory('tokoh', 2);
        // $data['populer'] = $this->home->populer(5);
         $this->output->cache(10);
        $this->load->view('anoalinux/index', $data);
        //$this->load->view('home/index', $data);
        //$this->load->view('home/footer', $data);

    }

    public function news()
    {
        $data['title'] = "Berita Kendari";
        $data['allnews'] = $this->news->getPosts();
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/v_berita', $data);
    }

    public function download()
    {
        $data['title'] = "Download";
        $data['menupage'] = $this->page->get_page();
        $data['allnews'] = $this->news->getPosts();
        $data['download'] = $this->download->get_file();
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/v_download', $data);
    }

    public function agenda()
    {
        $data['title'] = "Agenda";
        $data['menupage'] = $this->page->get_page();
        $data['allnews'] = $this->news->getPosts();
        $data['agenda'] = $this->agenda->get_agenda();
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/v_agenda', $data);
    }

    public function perda()
    {
        $data['title'] = "Perda Kota Kendari";
        $data['menupage'] = $this->page->get_page();
        //$data['allnews'] = $this->news->getPosts();
        $data['perda'] = $this->perda->get_perda();
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/v_perda', $data);
    }

    public function opd()
    {
        $data['title'] = "Perangkat Daerah";
        $data['menupage'] = $this->page->get_page();
       
        $kategori = $this->uri->segment(3);
        $data['opd'] = $this->opd->get_opd_bycategory($kategori);
        $data['menu'] = $this->direktori->get_direktori();
        $this->load->view('anoalinux/v_opd', $data);
         $this->output->cache(10);
    }

    public function pejabat()
    {
        $data['title'] = "Pejabat Pemerintah";
        $data['menupage'] = $this->page->get_page();
        //$data['pejabat'] = $this->pejabat->get_pejabat();
        $data['menu'] = $this->direktori->get_direktori();

        //pagination
        $this->load->library('pagination');
        $config['base_url'] = 'https://www.kendarikota.go.id/home/pejabat';
        $config['total_rows'] = $this->db->get('pejabat')->num_rows();
        $config['per_page'] = 8;

        //styling
        $config['full_tag_open'] = ' <nav aria-label="Page navigation"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'first';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active">';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        //initialise
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['pejabat'] = $this->pejabat->get_allpejabat($config['per_page'], $data['start']);
        $this->load->view('anoalinux/v_pejabat', $data);
    }
}
