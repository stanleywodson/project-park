<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(

			'title' => 'Formas de Pagamento',
			'subtitle' => 'pagamentos disponiveis',
			'payments' => $this->core_model->getAll('formas_pagamentos'),

			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net/js/park.js'
			)
		);

		$this->load->view('layout/header', $data);
		$this->load->view('payments/index');
		$this->load->view('layout/footer');
	}

	public function core($payment_id = '')
	{
		if (!$payment_id) {
			//o cadastro vai ocorrer caso nao informe o id

			$this->form_validation->set_rules('forma_pagamento_nome', 'Forma de Pagamento', 'trim|required|min_length[3]|max_length[20]|is_unique[formas_pagamentos.forma_pagamento_nome');

			if ($this->form_validation->run()) {

				$payment = html_escape($this->input->post('forma_pagamento_nome'));
				$type = html_escape($this->input->post('forma_pagamento_ativa'));

				$data = elements(
					array(
						'forma_pagamento_nome',
						'forma_pagamento_ativa',
					),
					$this->input->post()
				);

				$data['forma_pagamento_data_alteracao'] = date('Y-m-d H:i:s');

				$data = html_escape($data);

				if($this->core_model->insert('formas_pagamentos', $data)){

					$this->session->set_flashdata('sucesso', 'Dados cadastrados com sucesso!');
				}else{
					$this->session->set_flashdata('error', 'Erro ao cadastar Usuário!');
				}

				redirect($this->router->fetch_class());

			} else {
				$data = array(
					'title' => 'Formas de Pagamento',
					'subtitle' => 'pagamentos disponiveis',
				);

				$this->load->view('layout/header', $data);
				$this->load->view('payments/core');
				$this->load->view('layout/footer');
			}
		} else {
			// editar - usuário
			if ($this->core_model->getById('formas_pagamentos', array('forma_pagamento_id' => $payment_id))) {


				$this->form_validation->set_rules('forma_pagamento_nome', 'Forma de Pagamento', 'trim|required|min_length[3]|max_length[20]');


				if ($this->form_validation->run()) {

					$data = elements(
						array(
							'forma_pagamento_nome',
							'forma_pagamento_ativa'
						),
						$this->input->post()
					);

					$data = html_escape($data);

					if($this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $payment_id))){
						$this->session->set_flashdata('sucesso', 'Dados atualizados com sucesso!');
					}else{
						$this->session->set_flashdata('error', 'Dados nao foram atualizados!');
					}
					redirect($this->router->fetch_class());

				} else {
					// erro de validação
					$data = array(
						'title' => 'Formas de Pagamento',
						'subtitle' => 'pagamentos disponiveis',
						'payment' => $this->core_model->getById('formas_pagamentos', array('forma_pagamento_id' => $payment_id))
					);

					$this->load->view('layout/header', $data);
					$this->load->view('payments/core');
					$this->load->view('layout/footer');
				}



			} else {
				exit('usuário não existe');
			}
		}
	}

	public function del($payment_id = null)
	{
		if (!$this->core_model->getById('formas_pagamentos', array('forma_pagamento_id' => $payment_id))) {

			$this->session->set_flashdata('error', 'Usuário não existe!');
			redirect($this->router->fetch_class());

		} else {

			$this->core_model->delete('formas_pagamentos', array('forma_pagamento_id' => $payment_id));

			$this->session->set_flashdata('sucesso', 'Forma de Pagamento deletado com sucesso!');
			redirect($this->router->fetch_class());
		}
	}


}
