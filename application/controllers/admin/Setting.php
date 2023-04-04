<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model', 'setting');
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Settings';
        $data['setting'] = $this->setting->option();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/setting/index', $data);
        $this->load->view('templates/footer');
    }
    public function simpan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Settings';
        $data['setting'] = $this->setting->option();
        $data = [
            'site_name' => $this->input->post('site_name', TRUE),
            'site_description' => $this->input->post('site_desc', TRUE),
            'site_email' => $this->input->post('site_email', TRUE),
            'site_copyright' => $this->input->post('site_copyright', TRUE)

        ];

        $upload_image = $_FILES['site_logo']['name'];
        $upload_image2 = $_FILES['site_favicon']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/img';
            $config['allowed_types']        = 'jpeg|gif|jpg|png';
            $config['max_size']             = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('site_logo')) {

                if ($old_image != "default.jpg") {
                    $old_image = $data['setting']['site_logo'];
                    unlink(FCPATH . 'assets/img/' . $old_image);
                }
                $newimage = $this->upload->data('file_name');
                $this->db->set('site_logo', $newimage);
            } else {
                echo $this->upload->display_errors();
            }
        }

        if ($upload_image2) {
            $config['upload_path']          = './assets/img';
            $config['allowed_types']        = 'jpeg|gif|jpg|png';
            $config['max_size']             = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('site_favicon')) {

                if ($old_image2 != "default.jpg") {
                    $old_image2 = $data['setting']['site_favicon'];
                    unlink(FCPATH . 'assets/img/' . $old_image2);
                }
                $newimage2 = $this->upload->data('file_name');
                $this->db->set('site_favicon', $newimage2);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->setting->update($data);
        redirect('admin/setting');
    }

    public function simpan_banner()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Settings';
        $data['setting'] = $this->setting->option();

        $upload_ads = $_FILES['site_ads']['name'];

        if ($upload_ads) {
            $config['upload_path']          = './assets/img/banner';
            $config['allowed_types']        = 'jpeg|gif|jpg|png';
            $config['max_size']             = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('site_ads')) {
                $old_ads = $data['setting']['site_ads'];

                if ($old_ads != "default.jpg") {

                    unlink(FCPATH . 'assets/img/banner' . $old_ads);
                }
                $newimage3 = $this->upload->data('file_name');
                $this->db->set('site_ads', $newimage3);
                $this->db->update('setting');
            } else {
                echo $this->upload->display_errors();
            }
        }

        redirect('admin/setting');
    }
}
