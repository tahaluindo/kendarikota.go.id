<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'home');
        $this->load->model('Setting_model', 'setting');
    }

    public function index()
    {
        redirect('home');
    }

    public function detail($slug = false)
    {

        $data['cat_menu'] = $this->home->getAll_Category();
        $data['category'] = $this->home->getAll_Category();
        $data['detail'] = $this->home->get_AllNews($slug);
        $id = $data['detail']['id'];
        $data['tags'] = $this->home->getTags_byPost($id);

        if ($slug) {

            if (!$data['detail']['slug'] == $slug) {
                show_404();
            }

            // tambah jumlah View artikel 
            $this->load->library('post');
            if ($id > 0 and ($slug != false)) {
                $this->post->views($id);
            }
            $data['title'] = $data['detail']['title'];
            $data['populer'] = $this->home->populer(5);
            $data['metrokota'] = $this->home->get_All_Bycategory('Metro Kota', 4);
            $data['option'] = $this->setting->option();
            //$this->load->view('home/c_header', $data);
            $this->load->view('winku/single', $data);
            //$this->load->view('home/s_footer', $data);
        } else
            redirect('home');
    }
}
