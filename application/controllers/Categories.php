<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	public function index(){
		$data['title'] = 'Categories';

		$data['allcategories'] = $this->category_model->get_categories();

		$this->load->view('template/header');
		$this->load->view('categories/index', $data);
		$this->load->view('template/footer');
	}

	public function create(){
		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');

		if ($this->form_validation->run() === FALSE) {

			$this->load->view('template/header');
			$this->load->view('categories/create', $data);
			$this->load->view('template/footer');
		}else{

			$data = array(
				'name' => $this->input->post('name')
			);

			if ($this->category_model->create($data)) {
				$this->session->set_flashdata('success', 'Category is successfully created');
				redirect('categories');
			}
		}
	}

	public function postByCategory($id){
		$data['title'] = $this->category_model->get_category_name($id)->name;

		$data['allposts'] = $this->post_model->get_post_by_category($id);

		$this->load->view('template/header');
		$this->load->view('posts/index', $data);
		$this->load->view('template/footer');
	}

}