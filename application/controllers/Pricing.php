<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pricing extends CI_Controller
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

			'title' => 'Preços Cadastrados',
			'subtitle' => 'Listando todos os preços cadastrados',
			'pricing' => $this->core_model->getAll('precificacoes'),

			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
			),
			'scripts' => array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net/js/park.js'
			)
		);

		//retorno para enviar dados em json e receber via axios
		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($data['pricing']));

		$this->load->view('layout/header', $data);
		$this->load->view('pricing/index');
		$this->load->view('layout/footer');
	}
	/*
	public function core($pricing_id = '')
	{
		if (!$user_id) {
			//o cadastro vai ocorrer caso nao informe o id
			$this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('last_name', 'Sobre Nome', 'trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[20]|is_unique[users.username]');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Senha', 'required|trim|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirmar Senha', 'required|trim|min_length[8]|matches[password]');

			if ($this->form_validation->run()) {

				$username = html_escape($this->input->post('username'));
				$password = html_escape($this->input->post('password'));
				$email 	  = html_escape($this->input->post('email'));
				$additional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'active' => $this->input->post('active'),
				);
				$group = array($this->input->post('perfil'));

				$additional_data = html_escape($additional_data);

				if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){

					$this->session->set_flashdata('sucesso', 'Dados cadastrados com sucesso!');
				}else{
					$this->session->set_flashdata('error', 'Erro ao cadastar Usuário!');
				}

				redirect($this->router->fetch_class());
			}else{
				$data = array(
					'title' => 'Cadastrar Usuário',
					'subtitle' => '',
				);

				$this->load->view('layout/header', $data);
				$this->load->view('pricing/core');
				$this->load->view('layout/footer');
			}
		} else {

			// editar - usuário
			if ($this->ion_auth->user($user_id)->row()) {

				$this->form_validation->set_rules('precificacao_categoria', 'Categoria', 'trim|min_length[4]|max_length[20]');
				$this->form_validation->set_rules('precificacao_valor_hora', 'Valor Hora', 'trim|min_length[4]|max_length[20]');
				$this->form_validation->set_rules('precificacao_valor_mensalidade', 'Valor Mensalidade', 'trim|min_length[4]|max_length[20]');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|callback_email_check');
				$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Confirmar Senha', 'trim|min_length[8]|matches[password]');

				if ($this->form_validation->run()) {

					$data = elements(
						array(
							'first_name',
							'last_name',
							'username',
							'email',
							'password',
							'active'
						),
						$this->input->post()
					);


					$password = $this->input->post('password');


					if (!$password) {
						unset($data['password']);
					}

					$data = html_escape($data);

					if ($this->ion_auth->update($user_id, $data)) {
						$perfil_post = $this->input->post('perfil');
						//se perfil for diferente, atualiza o grupo
						if($perfil_atual->id != $perfil_post){
							$this->ion_auth->remove_group($perfil_atual->id, $user_id);
							$this->ion_auth->add_to_group($perfil_post, $user_id);
						}
						$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
					} else {
						$this->session->set_flashdata('error', 'Algo deu errado');
					}
					redirect($this->router->fetch_class());
				} else {
					// erro de validação
					$data = array(
						'title' => 'Editar Usuário',
						'subtitle' => '',
						'user' => $this->ion_auth->user($user_id)->row(),
						'perfil' => $this->ion_auth->get_users_groups($user_id)->row(),
					);

					$this->load->view('layout/header', $data);
					$this->load->view('pricing/core');
					$this->load->view('layout/footer');
				}

			} else {
				exit('usuário não existe');
			}
		}
	}
	*/
}
