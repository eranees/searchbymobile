<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()	{
		if($this->session->has_userdata('username')){
			return redirect("dashboard");
		}
		$this->load->view('login');
	}

	public function valid_login(){
		$this->form_validation->set_rules("email","Email","required|valid_email");
		$this->form_validation->set_rules("password","Password","required");
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');	
		$this->load->model("loginmodel","lm");	
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if($username = $this->lm->login($email,$password)){
				$this->session->set_userdata("username",$username);
				return redirect("dashboard");
			}else{
				$this->session->set_flashdata("login_error","Email or password is incorrect");
				return redirect("login");
			}
		}else{

			$this->index();
		}
	}

	public function signup(){
		$this->load->view('singup');	
	}

	public function signupDetails(){
		$post = $this->input->post();
		$this->form_validation->set_rules("uname","Name","required");
		$this->form_validation->set_rules("username","User Name","required|is_unique[users.username]");
		$this->form_validation->set_rules("email","Email","required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password","Password","required");
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			$this->load->model("loginmodel","lm");
			if($this->lm->add_user($post['uname'],$post['username'],$post['email'],$post['password'])){
				$this->session->set_flashdata("is_add","Your Account Is Created.");
            	$this->session->set_flashdata("alert_class","alert-success");
            	$this->index();
			}else{
				$this->session->set_flashdata("is_add","Your Account Is Not Created. Please Enter Valid Field Inputs");
            	$this->session->set_flashdata("alert_class","alert-danger");
            	$this->signup();
			}
		}else{
			$this->session->set_flashdata("is_update","Your Profile Not Updated Successfully");
            $this->session->set_flashdata("alert_class","alert-danger");
			$this->user_profile();
		}
	}
	public function logout(){
		if($this->session->has_userdata('username')){
			$this->session->unset_userdata('username');
			return redirect('login');
		}else{
			return redirect('login');
		}
	}

	public function forgot(){
		$this->load->view('forgot.php');
	}

	public function forgot_password(){
		$email = $this->input->post('email');
		$this->load->model("loginmodel","lm");
		if($e = $this->lm->check_email($email)){

			//send email
			
			$this->session->set_flashdata("is_forgot","We Have Sent You Password. Check Your Email Address");
            $this->session->set_flashdata("alert_class","alert-success");
			$this->forgot();
		}else{
			$this->session->set_flashdata("is_forgot","Enter Valid Email. This Email Does Not Belongs To Any Account");
            $this->session->set_flashdata("alert_class","alert-danger");			
			$this->forgot();
		}
	}
}

?>

