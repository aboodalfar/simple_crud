<?php

defined('BASEPATH') OR exit('No direct script access allowed');


 
class Post extends CI_Controller {
 
public function __construct(){
	parent::__construct();
	$this->load->helper('url');
	$this->load->model('post_model');
  $this->perPage = 10;
}

 
public function api(){
 


   $res = $this->post_model->read();

echo json_encode($res);
	
}

public function index(){
        $data = array();
        
        // Get posts data from the database
        $conditions['order_by'] = "id DESC";
        $conditions['limit'] = $this->perPage;
        $data['posts'] = $this->post_model->getRows($conditions);
        
        // Pass the post data to view
        $this->load->view('posts/index', $data);
    }

 function loadMoreData(){
        $conditions = array();
        
        // Get last post ID
        $lastID = $this->input->post('id');
        
        // Get post rows num
        $conditions['where'] = array('id <'=>$lastID);
        $conditions['returnType'] = 'count';
        $data['postNum'] = $this->post_model->getRows($conditions);
        
        // Get posts data from the database
        $conditions['returnType'] = '';
        $conditions['order_by'] = "id DESC";
        $conditions['limit'] = $this->perPage;
        $data['posts'] = $this->post_model->getRows($conditions);
        
        $data['postLimit'] = $this->perPage;
        
        // Pass data to view
        $this->load->view('posts/load-more-data', $data, false);
    }
	


 public function seed(){
$this->post_model->seed();
}




}