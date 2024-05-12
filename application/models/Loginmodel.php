<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Loginmodel extends CI_Model{

	public function login($email,$password){
		$query = $this->db->select('username')->from('users')->where(["email"=>$email,"password"=>$password]);
		return $query->get()->row('username');
	}
	public function add_user($name,$username,$email,$password){
		return $this->db->insert('users',['name'=>$name,'username'=>$username,'email'=>$email,'password'=>$password]);

	}	

	public function check_email($email){
		$query = $this->db->select('password')->from('users')->where(["email"=>$email]);
		return $query->get()->row('password');	
	}
}
?>