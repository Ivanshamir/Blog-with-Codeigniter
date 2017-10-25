<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

	public function create($data){
		$query = $this->db->insert('tbl_category', $data);
		return $query;
	}

	public function get_categories(){
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('tbl_category');
		return $query->result();
	}

	public function get_category_name($id){
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_category');
		return $query->row();
	}
}