<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{


	public function getUser($pin)
	{
		$this->db->select('*');
		$this->db->from("users");
		$this->db->where('pin', $pin);
		$result =  $this->db->get();
		return $result->num_rows() == 1 ? $result->row() : false;
	}
	public function get_active_season(){
		$this->db->where('status', 'active');
		return $this->db->get('seasons')->row();	 
	}

}
