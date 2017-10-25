<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

	public function create_comment($data){
		$query = $this->db->insert('tbl_comment', $data);
		return $query;
	}

	public function get_comments($datapostid){
		$id = $datapostid->id;
		$this->db->where('post_id', $id);
		$query = $this->db->get('tbl_comment');
		return $query->result();
	}

}