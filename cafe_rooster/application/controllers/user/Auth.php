<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim');
		if($this->form_validation->run() == false)
		{
			$this->load->view('user/login_page');
		}
		else
		{
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post("email");
		$pass = $this->input->post("pass");
		
		$user = $this->db->get_where("user", ['email' => $email])->row_array();
		if($user)
		{
			if($user['status_aktif'] == 1)
			{
				if($user['status_user'] == 2)
				{
					$passmd5 = md5($pass);
					if($passmd5 == $user['password'])
					{
						$data = [
							'email' => $user['email'],
							'id_user' => $user['id_user'],
							'nama' => $user['nama_lengkap']	
						];
						$this->session->set_userdata($data);
						redirect('Beranda');
						// var_dump($data);
						// die;
					}
					else
					{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Wrong Password!
						</div>');
						redirect('Login');
					}
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					This login page is for users only, 
					please login from the admin panel!
					</div>');
					redirect('Login');
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				This email has not been actived!
				</div>');
				redirect('Login');
			}
			
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email is not registered!
			</div>');
			redirect('Login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('id_user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			You have been logged out!
			</div>');
			redirect('Login');
	}
}