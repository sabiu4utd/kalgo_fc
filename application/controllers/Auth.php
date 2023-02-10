<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Auth_model");
		$this->load->model("Admin_model");
		$this->load->library('upload');
	}

	
	public function authentication()
	{
		 $pin = $this->input->post('pin');
		$result = $this->Auth_model->getUser($pin);
		 $season = $this->Auth_model->get_active_season();
	
		//$sem = $this->Auth_model->getseason();
	
		//var_dump($result); exit;
		if($result){
			 $this->session->set_userdata('fullname', $result->fullname);
			 $this->session->set_userdata('phone', $result->phone);
			 $this->session->set_userdata('role', $result->role);
			 $this->session->set_userdata('pin', $result->pin);
			 $this->session->set_userdata('season', $season->id);
			 $this->session->set_userdata('session', $season->season);
			
			 redirect('welcome/home', 'refresh');
		} else {
			
			$this->session->set_flashdata('msg', "Better check your PIN very well, because the PIN you are supplying is not correct, Thank you");
			redirect('welcome', 'refresh');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg success', "Signed Out Successfully");
		redirect("Welcome/index", "refresh");
	}

	
}
