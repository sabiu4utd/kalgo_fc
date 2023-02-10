<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	
	public function add_passport($userid, $ppt)
	{
		$this->db->set("passport", $ppt);
        $this->db->where("userid", $userid);
       	return $this->db->update("user_profile");
	}
	public function getUser($userid)
	{
		$this->db
		->select('*')
		->from('user_profile')
		->join('department', 'department.id=deptid')
		->where("userid", $userid);
       	return $this->db->get("")->row();
	}
	
	
	

	

}
