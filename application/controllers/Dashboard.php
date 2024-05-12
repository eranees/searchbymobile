<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function is_loggedIn(){
		if(!$this->session->has_userdata('username')){
			return redirect('login');
		}    	
    }

	public function index(){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$data = $this->dm->AddTotalLikes();
		$this->load->view('index.php',compact('data'));
	}

	public function addNewContact(){
		$this->is_loggedIn();
		$this->load->view("addnewcontact.php");
	}

	public function addContact(){
		$this->is_loggedIn();
		$this->form_validation->set_rules("fname","First Name","required");
		$this->form_validation->set_rules("lname","Last Name","required");
		$this->form_validation->set_rules("state","State","required");
		$this->form_validation->set_rules("district","District","required");
		$this->form_validation->set_rules("address","Village/City","required");
		$this->form_validation->set_rules("phone","Phone","required|min_length[10]|max_length[12]|numeric");
		//$this->form_validation->set_rules("userfile","Photo","required");
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $this->load->library('upload', $config);

		if($this->form_validation->run() && $this->upload->do_upload()){

            $data = $this->upload->data();
            $image_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
            $post = $this->input->post();
            unset($post['submit']);
            $post['photo'] = $image_path;
            $post['username'] = $this->session->userdata('username');
            $this->load->model("Dashboardmodel","dm");
            if($this->dm->add_phone_number($post)){
            	$this->session->set_flashdata("is_successfull","Phone Number Added Successfully");
            	$this->session->set_flashdata("alert_class","alert-success");
            	$this->load->view("addnewcontact.php");
            }else{
            	$this->session->set_flashdata("is_successfull","Phone Number Not Added Successfully");
            	$this->session->set_flashdata("alert_class","alert-danger");
            	$this->load->view("addnewcontact.php");
            }
		}
		else{
			$error = $this->upload->display_errors();
			$this->load->view("addnewcontact.php",compact('error'));
		}
	}

	public function view_contacts(){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$current_user = $this->session->userdata('username');
		$data = $this->dm->display_user_contacts($current_user);
		$this->load->view("displayphonedetails.php",compact('data'));
	}
	public function view($id){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$data = $this->dm->get_one_number($id);
		$this->load->view("viewphonnumber.php",compact('data'));
	}
	public function edit($id){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$data = $this->dm->edit_contacts($id);
		$this->load->view("edit.php",compact('data'));
	}

	public function editUserPhone(){
		$this->form_validation->set_rules("fname","First Name","required");
		$this->form_validation->set_rules("lname","Last Name","required");
		$this->form_validation->set_rules("state","State","required");
		$this->form_validation->set_rules("district","District","required");
		$this->form_validation->set_rules("address","Village/City","required");
		$this->form_validation->set_rules("phone","Phone","required|min_length[10]|max_length[12]|numeric");
		
		if($this->form_validation->run()){
            $post = $this->input->post();
            $this->load->model("Dashboardmodel","dm");
            $status = $this->dm->update_phone(
            	$post['ID'],$post['fname'],
            	$post['lname'],$post['state'],
            	$post['district'],$post['address'],
            	$post['phone']
            );
            if($status){
            	$this->session->set_flashdata("is_updated","Phone Number Updated Successfully");
            	$this->session->set_flashdata("alert_class","alert-success");
            	$this->view_contacts();
            }else{
            	$this->session->set_flashdata("is_updated","Phone Number Not Updated Successfully");
            	$this->session->set_flashdata("alert_class","alert-danger");
	            $this->view_contacts();
            }
		}
		else{
			$this->edit(); //problem
		}		
	}

	public function delete($id){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		if($this->dm->delete($id)){
			$this->session->set_flashdata("is_delete","Phone Number Deleted Successfully");
            $this->session->set_flashdata("alert_class","alert-success");
            $this->view_contacts();
		}else{
			$this->session->set_flashdata("is_delete","Phone Number Not Deleted Successfully");
            $this->session->set_flashdata("alert_class","alert-danger");
	        $this->view_contacts();
		}
	}
	public function searchnumber_global(){
		$this->is_loggedIn();
		$this->form_validation->set_rules("pnumber","Phone Number","required|min_length[10]|max_length[12]|numeric");
		if($this->form_validation->run()){

			$this->load->model("Dashboardmodel","dm");
			if($data = $this->dm->search_number($this->input->post('pnumber'))){
				$this->load->view("found.php",compact('data'));
			}else{
				$data = $this->input->post('pnumber');
				$this->load->view("not_found.php",compact('data'));
			}
		}else{
			$this->index();
		}

	}

	public function send_message(){
		$this->is_loggedIn();
		$this->form_validation->set_rules('message','Message','required|max_length[450]');
		if($this->form_validation->run()){
			$post = $this->input->post();
			$this->load->model("Dashboardmodel","dm");
			if($this->dm->send_message_siteadmin($post['username'],$post['message'])){
				$this->session->set_flashdata("is_message","Message Send Successfully");
            	$this->session->set_flashdata("alert_class","alert-success");				
				$this->index();
			}else{
				$this->session->set_flashdata("is_message","Message Not Send Successfully");
            	$this->session->set_flashdata("alert_class","alert-success");								
				$this->index();
			}
		}else{
			$this->index();
		}
	}

	public function my_messages(){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$current_user = $this->session->userdata('username');
		$data = $this->dm->messages($current_user);
		$this->load->view("mymessages.php",compact('data'));
	}

	public function add_new_like(){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$this->dm->update_like();
		$this->index();
	}	
	public function user_profile(){
		$this->is_loggedIn();
		$this->load->model("Dashboardmodel","dm");
		$current_user = $this->session->userdata('username');
		$data = $this->dm->get_user($current_user);
		$this->load->view("profile.php",compact('data'));
	}

	public function edit_user_profile(){
		$post = $this->input->post();
		$this->form_validation->set_rules("uname","Name","required");
		$this->form_validation->set_rules("username","User Name","required");
		$this->form_validation->set_rules("email","Email","required|valid_email");
		$this->form_validation->set_rules("password","Password","required");
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		if($this->form_validation->run()){
			$this->load->model("Dashboardmodel","dm");
			if($this->dm->update_user($post['uname'],$post['username'],$post['email'],$post['password'])){
				$this->session->set_flashdata("is_update","Your Profile Updated Successfully");
            	$this->session->set_flashdata("alert_class","alert-success");
            	$this->user_profile();
			}else{
				$this->session->set_flashdata("is_update","Your Profile Not Updated Successfully");
            	$this->session->set_flashdata("alert_class","alert-danger");
            	$this->user_profile();
			}
		}else{
			$this->session->set_flashdata("is_update","Your Profile Not Updated Successfully");
            $this->session->set_flashdata("alert_class","alert-danger");
			$this->user_profile();
		}
	}

	public function deletemsg($id){
    	$this->load->model("Dashboardmodel","dm");
    	$this->dm->delete_message($id);
    	$this->my_messages();		
	}

	public function test(){
		$this->load->view('test');
	}
}

?>