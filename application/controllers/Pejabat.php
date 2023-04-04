<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('pejabat_model', 'pejabat');
    }

    public function index()
    {
        $data['title'] = "Pejabat Pemerintah";
        //$data['pejabat'] = $this->pejabat->get_pejabat();
        //$data['menu'] = $this->direktori->get_direktori();

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

    public function detail($id = false)
    {
        if (!$id == false) {
            $data['title'] = "Pejabat Pemerintah";
            $data['pejabat'] = $this->pejabat->get_pejabat($id);
            $this->load->view('anoalinux/v_detail_pejabat', $data);
        } else redirect('home');
    }
}
