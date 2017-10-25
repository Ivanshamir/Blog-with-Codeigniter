<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function register(){
		$data['title'] = 'Registration';

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|callback_check_username_exists|callback_check_preg');
		$this->form_validation->set_rules('zipcode', 'Zipcode');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email||callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {

			$this->load->view('template/header');
			$this->load->view('users/register', $data);
			$this->load->view('template/footer');
		}else{

			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'zipcode' => $this->input->post('zipcode'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))

			);

			if ($this->user_model->register($data)) {
				$this->session->set_flashdata('success', 'User has been successfully registered.Now you can login');
				redirect('posts');
			}

		}
	}

	public function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', 'That username is taken.Please choose another');
		if ($this->user_model->check_username_exists($username)) {
			return true;
		}else{
			return false;
		}
	}

	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists', 'That email is taken.Please choose another');
		if ($this->user_model->check_email_exists($email)) {
			return true;
		}else{
			return false;
		}	
	}

	public function check_preg($username){
		$this->form_validation->set_message('check_preg', 'Username only contains alphanumeric, dashes, underscores and whitespaces!');
		if (!preg_match('/[^a-z0-9_ -]+/i', $username)) {
			return true;
		}else{
			return false;
		}	
	}
}