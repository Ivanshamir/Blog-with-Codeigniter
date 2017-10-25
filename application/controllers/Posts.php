<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function index($offset = 0){
		//Pagination
		$config['base_url'] = base_url().'posts/index/';
		$config['total_rows'] = $this->db->count_all('tbl_post');
		$config['per_page'] = 3;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-links');

		//Pagination Start
		$this->pagination->initialize($config);


		$data['title'] = 'Latest Posts';

		$data['allposts'] = $this->post_model->get_posts($config['per_page'], $offset);

		$this->load->view('template/header');
		$this->load->view('posts/index', $data);
		$this->load->view('template/footer');
	}

	public function view($slug = NULL){
		$data['post'] = $this->post_model->get_post_by_slug($slug);
		$data['postid'] = $this->post_model->get_post_by_id($slug);

		$data['allcomments'] = $this->comment_model->get_comments($data['postid']);

		if (empty($data['post'])) {
			show_404();
		}

		$this->load->view('template/header');
		$this->load->view('posts/view', $data);
		$this->load->view('template/footer');

	}

	public function create(){
		$data['title'] = 'Create Posts';

		$this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
		$this->form_validation->set_rules('body', 'Body', 'required|min_length[5]');

		if ($this->form_validation->run() === FALSE) {

			$data['categories'] = $this->post_model->get_categories();

			$this->load->view('template/header');
			$this->load->view('posts/create', $data);
			$this->load->view('template/footer');
		}else{

			//upload image
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '500';
			$config['max_height'] = '500';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			}else{
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}


			$slug = str_replace(' ', '-', $this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'post_image' => $post_image,
				'category_id' => $this->input->post('category_id')
			);

			if ($this->post_model->create($data)) {
				$this->session->set_flashdata('success', 'Posts are successfully created');
				redirect('posts');
			}
		}

	}

	public function delete($id){
		if ($this->post_model->delete_posts($id)) {
			$this->session->set_flashdata('success', 'Posts are successfully deleted');
			redirect('posts');
		}
	}

	public function edit($slug){
		$data['title'] = 'Edit Posts';

		$this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
		$this->form_validation->set_rules('body', 'Body', 'required|min_length[5]');

		if ($this->form_validation->run() === FALSE) {

			$data['post'] = $this->post_model->get_editpost_slug($slug);
			$data['categories'] = $this->post_model->get_categories();

			$this->load->view('template/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('template/footer');
		}else{

			 $slug = str_replace(' ', '-', $this->input->post('title'));
			$id =  $this->input->post('id');

			// $image_file_name = //$this->db->select('post_image')->where('id', $id)->get('tbl_post')->row()->post_image;



			 $image_file_name = $this->post_model->get_image_by_id($id);
			$cwd = getcwd();//save the current directory
			$image_file_path = $cwd."\\assets\\images\\posts\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd);//Restore the previous worling directory



			//upload image
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '500';
			$config['max_height'] = '500';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'noimage.jpg';
			}else{
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}


			$data = array(
				'category_id' => $this->input->post('category_id'),
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'post_image' => $post_image,
				'body' => $this->input->post('body')
			);
			if ($this->post_model->update_post($id, $data)) {
				$this->session->set_flashdata('success', 'Posts are successfully updated');
				redirect('posts');
			}
		}
	}
}