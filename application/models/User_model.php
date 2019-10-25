<?php

class User_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
public function create($first,$last,$email,$password,$age){

$password = md5($password);
	$query = $this->db->query("insert into users(first_name,last_name,password,age,email) values('$first','$last','$password','$age','$email')");
		if($query){
			return "success";
		}else{
			return "failed";
		}
}

public function update($id,$first,$last,$email,$age){

$data = array(
        'first_name' => $first,
        'last_name' => $last,
        'email' => $email,
'age' => $age
);

$this->db->where('id', $id);
return $this->db->update('users', $data);
}
public function read(){
	$query = $this->db->query("select * from users");
	return $query;
}


	
public function get_record_byID($id){
	$query = $this->db->query("select * from users where id='$id'");
	return $query->row();
}


	
public function delete($id){
	$query = $this->db->query("delete from users where id ='$id'");
	if($query){
		return "success";
	}else{
		return "failed";
	}
}
public function check_login($email,$pass){
  $pass = md5($pass);
	$query = $this->db->query("select * from users where email='$email' and password='$pass'");
	return $query->row();
}
}