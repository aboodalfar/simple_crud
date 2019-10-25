<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
public function __construct(){
	parent::__construct();
	$this->load->helper('url');
	$this->load->model('user_model');
}
public function index()
{
	$data['res_id'] = $this->user_model->read();
	$this->load->view('view_user',$data);
}
 
public function create(){
	$this->load->view("create_user");
}
 
public function create_user(){
 
	$first_name = $this->input->post('fname');
	$last_name = $this->input->post('lname');
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$age = $this->input->post('age');



$res = $this->user_model->create($first_name,$last_name,$email,$password,$age);
		if($res == "success"){
			redirect(site_url('user'));
		}else{
			redirect(site_url('user/create_failed'));
		}
}
	
public function create_failed(){
	echo "create operation failed";
}

public function read(){
	$data['res_id'] = $this->user_model->read();
	$this->load->view('view_user',$data);
}
public function update($id){
	$data['crud_data'] = $this->user_model->get_record_byID($id);
	if(!empty($data['crud_data'])){
		$this->load->view('update_user',$data);
	}else{
		redirect(site_url());
	}
}

public function update_failed(){
	echo "Update operation failed";
}

public function delete($id){
	$res = $this->user_model->delete($id);
	if($res == "success"){
		redirect(site_url('user/read'));
	}else{
		redirect(site_url('user/delete_failed'));
	}
}


	
public function delete_failed(){
	echo "Delete operation failed";
}
public function login(){
	$this->load->view("login_user");
}

public function check_login(){


	$email = $this->input->post('email');
	$password = $this->input->post('password');
	



$res = $this->user_model->check_login($email,$password);
		if($res){
			echo "success";
		}else{
			echo "fail";
		}

}

public function update_user(){
 
	$first_name = $this->input->post('fname');
	$last_name = $this->input->post('lname');
	$email = $this->input->post('email');
	
	$age = $this->input->post('age');
        $id = $this->input->post('id');



$res = $this->user_model->update($id,$first_name,$last_name,$email,$age);
		if($res){
			redirect(site_url('user'));
		}else{
			redirect(site_url('user/create_failed'));
		}
}
 
}