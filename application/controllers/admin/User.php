<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
    }
    public function index()
    {

        $data['title'] = 'My Profile';
        $data['user'] = $this->user->getSession();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->user->getSession();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yg akan diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path']          = './assets/img/profile';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != "default.jpg") {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $newimage = $this->upload->data('file_name');
                    $this->db->set('image', $newimage);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            // Update User
            $this->user->editUser($name, $email);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Update Data Berhasil</div>');
            redirect('admin/user');
        }
    }

    public function changepassword()
    {

        $data['title'] = 'Change Password';
        $data['user'] = $this->user->getSession();
        $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            // Ubah Password
            //$this->User_model->changePassword();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            // cek current password apakah sama didatabase
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Current Password Salah</div>');
                redirect('admin/user/changepassword');
            } else {
                // cek New Password apa Sama dengan Current Password
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Password Lama Tidak Boleh Sama</div>');
                    redirect('admin/user/changepassword');
                } else {
                    //password sudah oke dan Update Database
                    $password_hash = password_hash($new_password, PASSWORD_BCRYPT);
                    $email = $this->session->userdata('email');

                    //ubah password
                    $this->user->changePassword($password_hash, $email);
                    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Password Changed</div>');
                    redirect('admin/user/changepassword');
                }
            }
        }
    }
}
