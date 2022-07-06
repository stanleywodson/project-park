<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
	}

	public function index()
    {
        $data = array('title' => 'Home');
        
        $this->load->view('layout/header', $data);
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }

}

