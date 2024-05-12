<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
		$this->is_loggedIn();
		$this->load->model("adminmodel","am");
		$data = $this->am->display_user_contacts();
		$this->load->view("admin/index.php",compact('data'));
	}

    public function is_loggedIn(){
		if(!$this->session->has_userdata('name')){
			return redirect('adminlogin');
		}    	
    }

    public function message(){
    	$this->is_loggedIn();
    	$this->load->model("adminmodel","am");
    	$data = $this->am->get_messages(0);
    	$this->load->view("admin/messages",compact('data'));
    }

    public function feedback(){
    	$this->load->model("adminmodel","am");
    	$post = $this->input->post();
    	if($this->am->send_feedback($post['feedback'],$post['username'])){
    		$this->session->set_flashdata("feedback","Feedback Send Successfully.");
    		$this->session->set_flashdata("alert_class","alert-success");
    		$this->message();
    	}else{
    		$this->session->set_flashdata("feedback","Feedback Not Sent.");
    		$this->session->set_flashdata("alert_class","alert-danger");
    		$this->message();
    	}
    }

    public function deleteMsg($id){
    	$this->load->model("adminmodel","am");
    	$this->am->delete_message($id);
    	$this->message();
    }

    public function addContact(){
    	$this->load->view("admin/addcontact");
    }

    public function add_new_contact(){
    	$this->form_validation->set_rules("fname","First Name","required");
		$this->form_validation->set_rules("lname","Last Name","required");
		$this->form_validation->set_rules("state","State","required");
		$this->form_validation->set_rules("district","District","required");
		$this->form_validation->set_rules("address","Village/City","required");
		$this->form_validation->set_rules("phone","Phone","required|min_length[10]|max_length[12]|numeric");
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
            $post['username'] = $this->session->userdata('name');
            $this->load->model("adminmodel","am");
            if($this->am->add_phone_number($post)){
            	$this->session->set_flashdata("is_successfull","Phone Number Added Successfully");
            	$this->session->set_flashdata("alert_class","alert-success");
            	$this->load->view("admin/addcontact.php");
            }else{
            	$this->session->set_flashdata("is_successfull","Phone Number Not Added Successfully");
            	$this->session->set_flashdata("alert_class","alert-danger");
            	$this->load->view("admin/addcontact.php");
            }
		}
		else{
			$error = $this->upload->display_errors();
			$this->load->view("admin/addcontact.php",compact('error'));
		}
    }

    public function view($id){
        $this->is_loggedIn();
        $this->load->model("adminmodel","am");
        $data = $this->am->get_one_number($id);
        $this->load->view("admin/view.php",compact('data'));
    }

    public function delete($id){
        $this->is_loggedIn();
        $this->load->model("adminmodel","am");
        if($this->am->delete($id)){
            $this->session->set_flashdata("is_delete","Phone Number Deleted Successfully");
            $this->session->set_flashdata("alert_class","alert-success");
            $this->index();
        }else{
            $this->session->set_flashdata("is_delete","Phone Number Not Deleted Successfully");
            $this->session->set_flashdata("alert_class","alert-danger");
            $this->index();
        }
    }

    public function edit($id){
        $this->is_loggedIn();
        $this->load->model("adminmodel","am");
        $data = $this->am->edit_contacts($id);
        $this->load->view("admin/edit.php",compact('data'));
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
            $this->load->model("adminmodel","am");
            $status = $this->am->update_phone(
                $post['ID'],$post['fname'],
                $post['lname'],$post['state'],
                $post['district'],$post['address'],
                $post['phone']
            );
            if($status){
                $this->session->set_flashdata("is_updated","Phone Number Updated Successfully");
                $this->session->set_flashdata("alert_class","alert-success");
                $this->index();
            }else{
                $this->session->set_flashdata("is_updated","Phone Number Not Updated Successfully");
                $this->session->set_flashdata("alert_class","alert-danger");
                $this->index();
            }
        }
        else{
            $this->edit(); //problem
        }       
    }
}
?>