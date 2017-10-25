<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

	public function create($id){
		
		$slug = $this->input->post('slug');

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('body', 'Body', 'required|min_length[5]');

		if ($this->form_validation->run() === FALSE) {
			

			$data['post'] = $this->post_model->get_post_by_slug($slug);
			$data['postid'] = $this->post_model->get_post_by_id($slug);

			

			$this->load->view('template/header');
			$this->load->view('posts/view', $data);
			$this->load->view('template/footer');

		}else{

			$data = array(
				'post_id' => $id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')
			);

			$this->comment_model->create_comment($data);

			redirect('posts/'.$slug);
		}
	}
}