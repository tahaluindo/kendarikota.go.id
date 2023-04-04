<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Post_model', 'post');
    }

    public function index()
    {
        echo 'index';
    }
    public function add()
    {
        $data['title'] = 'Add New Post';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->post->getCategory();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/post/add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_author = $data['user']['id'];
            $str = strtolower($this->input->post('title'));
            $slug = str_replace(" ", "-", $str);
            $slug = str_replace(",", "", $slug);
            $slug = str_replace("/", "-", $slug);
            $cat = $this->input->post('category');

            $data = [
                'title' => $this->input->post('title', true),
                'slug' => $slug,
                'excerpt' => $this->input->post('excerpt', true),
                'text' => $this->input->post('body', true),
                'foto' => $this->_uploadimage(),
                'caption' => $this->input->post('caption', true),
                'id_category' => $cat,
                'id_author' => $id_author,
                'headline' => 'no',
                'status' => 1,
                'date_created' => time(),
                'update_date' => time(),
                'views' => 0
            ];
            // simpan data
            $this->post->addNews($data);
            $this->db->order_by('id', 'desc');
            $data = $this->db->get('news')->row_array();
            $tags = $this->input->post('tag');

            // jika tag di input, lakukan pemisahan berdasarkan koma
            if ($tags) {
                $tag = explode(',', $tags);

                $no = 0;
                foreach ($tag as $t) {
                    $tagar = [
                        'tag' => $t,
                        'id_post' => $data['id']
                    ];
                    // simpan tag ke table tags
                    $this->db->insert('tags', $tagar);
                    $no++;
                };
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita Berhasil Disimpan</div>');
            redirect('admin/post/add');
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

    public function list()
    {
        $data['title'] = 'All Post';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['news'] = $this->post->getNewsCat_User_Byid();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/post/list', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id = NULL)

    {
        $news = $this->post->getNewsByID($id);

        if (!$id == NULL) {

            if ($news['id'] == $id) {
                $this->post->deleteNews($id);
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Delete Success</div>');
                redirect('admin/post/list');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Not Found</div>');
                redirect('admin/post/list');
            }
        } else redirect('admin/post/list');
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        $data['title'] = 'Edit News';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['news'] = $this->post->getNewsCat_User_Byid($id);
        $data['category'] = $this->post->getCategory();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/post/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path']          = './assets/img/news';
                $config['allowed_types']        = 'jpeg|gif|jpg|png';
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['news']['foto'];
                    if ($old_image != "default.jpg") {
                        unlink(FCPATH . 'assets/img/news/' . $old_image);
                    }
                    $newimage = $this->upload->data('file_name');
                    $this->db->set('foto', $newimage);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->post->editNews($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Update Success</div>');
            redirect('admin/post/list');
        }
    }

    public function set_publish($id)
    {
        $data = $this->post->getNewsByID($id);

        if ($data['status'] == 1) {
            $this->db->set('status', 0);
        } else $this->db->set('status', 1);

        $this->db->where('id', $id);
        $this->db->update('news');
        redirect('admin/post/list');
    }
    public function set_Headline($id)
    {
        $data = $this->post->getNewsByID($id);

        if ($data['headline'] == 'yes') {
            $this->db->set('headline', 'no');
        } else {
            $this->db->set('headline', 'yes');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Set Headline Success</div>');
        }
        $this->db->where('id', $id);
        $this->db->update('news');
        redirect('admin/post/list');
    }
}
