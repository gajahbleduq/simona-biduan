<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Commist_model');

		$this->load->library('General');

	}

	public function index() {
		echo "Test Call";
//		$this->load->view('email/template');
	}

	public function send_wa(){

		$ret = $this->general->send_wa();
		echo json_encode($ret);
	}

	public function send_mail(){

		$ret = $this->general->send_mail();
		echo json_encode($ret);
	}

}
