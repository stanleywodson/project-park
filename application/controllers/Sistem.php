<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sistem extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->ion_auth->logged_in()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'Editar Informações do Sistema',
			'subtitle' => '',
			'system' => $this->core_model->getById('sistema', array('sistema_id' => 1)),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('sistema/index');
		$this->load->view('layout/footer');
	}
}
