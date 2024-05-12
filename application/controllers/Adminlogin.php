<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	public function index(){
		$this->is_loggedIn();
		return redirect("admin");
	}
    public function is_loggedIn(){
		if(!$this->session->has_userdata('name')){
			return redirect('adminlogin/admin_login');
		}    	
    }

	public function admin_login(){
		$this->load->view("admin/adminlogin.php");
	}

	public function check_valid_admin(){
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			$post = $this->input->post();
			$this->load->model('adminmodel','am');
			if($name = $this->am->check_credentials($post['email'],$post['password'])){
				$this->session->set_userdata("name",$name);
				return redirect("admin");
			}else{
				$this->session->set_flashdata("is_valid","The Email or Password is Incorrect");
				$this->admin_login();
			}

		}else{
			$this->admin_login();
		}
	}
	public function logout(){
		if($this->session->has_userdata('name')){
			$this->session->unset_userdata('name');
			return redirect('adminlogin');
		}else{
			return redirect('adminlogin');
		}
	}
}

?>

