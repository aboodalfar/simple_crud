<?php

class Post_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
   // Per page limit
        $this->perPage = 10;

 $this->tblName = "posts";
	}
	
public function read(){
	$query = $this->db->query("select * from posts");
	return $query->result();
}

function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->tblName);
        
        //fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("order_by",$params)){
            $this->db->order_by($params['order_by']);
        }
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }


}