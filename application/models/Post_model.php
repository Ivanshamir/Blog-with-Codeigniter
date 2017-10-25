<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

	// public function __construct(){
	// 	$this->load->database();
	// }

	public function get_categories(){
		$this->db->order_by('name');
		$query = $this->db->get('tbl_category');
		return $query->result();
	}

	public function get_posts($limit = FALSE, $offset = FALSE){
		if($limit){
			$this->db->limit($limit, $offset);
		}
		
		
		$this->db->order_by('tbl_post.id', 'desc');
		$this->db->join('tbl_category', 'tbl_category.id = tbl_post.category_id');
		$query = $this->db->get('tbl_post');
		return $query->result();
	}

	public function get_post_by_slug($slug){
		$this->db->where('tbl_post.slug', $slug);
		$this->db->join('tbl_category', 'tbl_category.id = tbl_post.category_id');
		$query = $this->db->get('tbl_post');
		return $query->row();

	}

	public function get_post_by_id($slug){
		$this->db->where('slug', $slug);
		$query = $this->db->get('tbl_post');
		return $query->row();
	}

	public function get_editpost_slug($slug){
		$this->db->where('slug', $slug);
		$query = $this->db->get('tbl_post');
		return $query->row();
	}

	public function create($data){
		$query = $this->db->insert('tbl_post', $data);
		return $query;
	}

	public function delete_posts($id){
		$image_file_name = $this->db->select('post_image')->where('id', $id)->get('tbl_post')->row()->post_image;
		$cwd = getcwd();//save the current directory
		$image_file_path = $cwd."\\assets\\images\\posts\\";
		chdir($image_file_path);
		unlink($image_file_name);
		chdir($cwd);//Restore the previous worling directory
		$this->db->where('id', $id);
		$this->db->delete('tbl_post');
		return true;
	}

	public function update_post($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('tbl_post', $data);
		
	}

	public function get_post_by_category($id){
		$this->db->where('tbl_post.category_id', $id);
		$this->db->join('tbl_category', 'tbl_category.id = tbl_post.category_id');
		$query = $this->db->get('tbl_post');
		return $query->result();
	}

	public function get_image_by_id($id){
		$query = $this->db->select('post_image')->where('id', $id)->get('tbl_post')->row();
		return $query->post_image;
	}

}