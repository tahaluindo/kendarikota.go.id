<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('email');
	}

	public function index()
	{


		if ($this->session->userdata('email')) {
			redirect('admin/user');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = "User Login";
			$this->load->view("templates/auth_header", $data);
			$this->load->view("auth/login");
			$this->load->view("templates/auth_footer");
		} else {

			// Jalankan function _login
			$this->_login();
		}
	}

	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {

					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					// Simpan Session dari variable $data
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						redirect('admin/dashboard');
					} else {
						redirect('admin/user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Passwordn Anda Salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">User tidak Aktif</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Email tidak terdaftar</div>');
			redirect('auth');
		}
	}

	private function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		}
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|is_unique[user.email]|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {

			$data['title'] = "User Registration";
			$this->load->view("templates/auth_header", $data);
			$this->load->view("auth/registration");
			$this->load->view("templates/auth_footer");
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1', TRUE), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			//siapkan token
			$token = bin2hex(random_bytes(30));
			$user_token = [
				'email' => $this->input->post('email', true),
				'token' => $token,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Selamat Anda Telah Registrasi</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'sayurbay4m@gmail.com',
			'smtp_pass' => 'sayurbeningji',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"

		];

		$this->email->initialize($config);
		$this->email->from('sayurbay4m@gmail.com', ' WPU LOGIN');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this Link To Activated Your Account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
		}
		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify()
	{
		//ambil nilai email & token di Link Activate
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		// query ke table user & user_token
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();


		if ($user) {
			// cek jika token di database user_token = $token yang di Link


			if ($user_token['token'] == $token) {

				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

					//Aktivasi Sukses
					$this->db->get_where('user', ['email' => $email]);
					$this->db->update('user', ['is_active' => 1]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-succes text-center" role="alert">Activate Success</div>');
					redirect('auth');
				} else {

					//token sudah expire
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Token Expired</div>');
					redirect('auth');
				}
			} else {

				//token tidak valid
				$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Token Not Valid</div>');
				redirect('auth');
			}
		} else {

			//Email Tidak Valid
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Email Not Valid</div>');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Logout Sukses</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
