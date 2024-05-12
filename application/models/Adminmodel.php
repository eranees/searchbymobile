<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {
	public function check_credentials($email,$password){
		$query = $this->db->select('name')->from('admin')->where(["email"=>$email,"password"=>$password]);
		return $query->get()->row('name');
	}
	public function display_user_contacts(){
		$resultSet = $this->db->get('phone_details');
		return $resultSet->result();
	}
	public function get_messages($flag){
		$resultSet = $this->db->get_where('message',["flag"=>$flag]);
		return $resultSet->result();
	}

	public function send_feedback($feedback,$username){
		return $this->db->insert('message',['message'=>$feedback,'username'=>$username,'flag'=>1]);
	}
	public function delete_message($id){
		return $this->db->delete('message',['id'=>$id]);
	}
	public function add_phone_number($array){
		return $this->db->insert('phone_details',$array);
	}
	public function get_one_number($id){
		$resultSet = $this->db->get_where('phone_details',["id"=>$id]);
		return $resultSet->result();	
	}
	public function delete($id){
		return $this->db->delete('phone_details',['id'=>$id]);
	}

	public function edit_contacts($id){
		$resultSet = $this->db->get_where('phone_details',["id"=>$id]);
		return $resultSet->result();
	}
	public function update_phone($id,$fname,$lname,$state,$district,$address,$phone){
		$this->db->where('id',$id);
		return $this->db->update('phone_details',['fname'=>$fname,'lname'=>$lname,'state'=>$state,
			'district'=>$district,'address'=>$address,'phone'=>$phone]);

	}	
}
?>