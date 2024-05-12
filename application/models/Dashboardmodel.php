<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboardmodel extends CI_Model{

	public function add_phone_number($array){
		return $this->db->insert('phone_details',$array);
	}

	public function display_user_contacts($username){
		$resultSet = $this->db->get_where('phone_details',["username"=>$username]);
		return $resultSet->result();
	}

	public function get_one_number($id){
		$resultSet = $this->db->get_where('phone_details',["id"=>$id]);
		return $resultSet->result();	
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
	public function delete($id){
		return $this->db->delete('phone_details',['id'=>$id]);
	}

	public function search_number($phonenumber){
		$resultSet = $this->db->get_where('phone_details',["phone"=>$phonenumber]);
		return $resultSet->result();		
	}

	public function send_message_siteadmin($username,$message,$flag=0){
		return $this->db->insert('message',['message'=>$message,'username'=>$username,'flag'=>$flag]);
	}

	public function messages($username){
		$resultSet = $this->db->get_where('message',["username"=>$username,"flag"=>1]);
		return $resultSet->result();
	}

	public function AddTotalLikes(){
		$query = $this->db->select('likes')->from('setting');
		return $query->get()->row('likes');
	}
	public function update_like(){
		$query = $this->db->select('likes')->from('setting');
		$like =  $query->get()->row('likes');
		return $this->db->update('setting',['likes'=>$like+=1]);

	}
	public function get_user($username){
		$resultSet = $this->db->get_where('users',["username"=>$username]);
		return $resultSet->result();
	}

	public function update_user($name,$username,$email,$password){
		$this->db->where('username',$username);
		return $this->db->update('users',['name'=>$name,'username'=>$username,'email'=>$email,'password'=>$password]);
	}

	public function delete_message($id){
		return $this->db->delete('message',['id'=>$id]);
	}
}
?>