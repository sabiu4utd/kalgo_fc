<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('Welcome_model');
			$this->load->model('Auth_model');
			$this->load->model('Admin_model');
			$this->load->library('upload');
			//$this->load->library('phpmailer_lib');
		}
	
	public function index()
	{
		
		$season = $this->Auth_model->get_active_season();
		$this->session->set_userdata("season", $season->id);
		$this->load->view('index');
	}
	public function home(){
		$data['result']= $this->Admin_model->get_saeasons();
		$data['teams']= $this->Admin_model->get_teams();
		$this->load->view('admin/home', $data);
	}
	
	
}
