<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$data = array(
			'title' => 'Login',
		);

		$this->load->view('layout/header', $data);
		$this->load->view('login/index');
		$this->load->view('layout/footer');
	}

	public function auth()
	{
		$identity = html_escape($this->input->post('email'));
		$password = html_escape($this->input->post('password'));
		$remember = false;

		$user_name = $this->core_model->getById('users', array('email'=> $identity));


		if($this->ion_auth->login($identity, $password, $remember)){
			$this->session->set_flashdata('sucesso', 'Seja bem vindo(a)!  '.$user_name->first_name.' '.$user_name->last_name);
			redirect('/');
		}else{
			$this->session->set_flashdata('error', 'Email e ou/Login errados');
			redirect($this->router->fetch_class());


		}

	}

	public function logout()
	{

		$this->ion_auth->logout();
		redirect($this->router->fetch_class());

	}

}
