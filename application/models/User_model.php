<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function register($data){
		$query = $this->db->insert('tbl_users', $data);
		return $query;
	}

	public function check_username_exists($username){
		$this->db->where('username', $username);
		$query = $this->db->get('tbl_users');

		if (empty($query->row())) {
			return true;
		}else{
			return false;
		}
	}

	public function check_email_exists($email){
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');

		if (empty($query->row())) {
			return true;
		}else{
			return false;
		}
	}
}