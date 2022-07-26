<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Parking extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		}
		$this->load->model('park_model');
	}

	public function index()
	{
		$data = array(

			'title' => 'Estacionamento',
			'subtitle' => 'veiculos estacionados',
			'parks' => $this->park_model->getAll('estacionar'),

			'styles' => array(
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),

			'scripts' => array(
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net/js/park.js'
			)
		);

//		echo 'pre';
//		print_r($data['parks']);die();dddddd

		$this->load->view('layout/header', $data);
		$this->load->view('parking/index');
		$this->load->view('layout/footer');
	}

	public function core($park_id = null)
	{
		if(!$park_id){
			//cadastrar
		}else{
			if(!$this->core_model->getById('estacionar', array('estacionar_id'=> $park_id))){
				$this->session->set_flashdata('error', 'ticket nao encontrado para encerramento');
				redirect($this->router->fetch_class());
			}else{
				//Encerramento
				$data = array(

					'title' => 'Encerrando ticket',
					'subtitle' => 'chegou a hora de encerrar',
					'texto_modal' =>'tem certeza que deseja encerrar o ticket' ,
					'estacionado' => $this->core_model->getById('estacionar',  array('estacionar_id'=> $park_id)),
					'preficicacoes' =>  $this->core_model->getAll('precificacoes',  array('precificacao_ativa'=> 1)),
					'formas_pagamentos' => $this->core_model->getAll('formas_pagamentos', array('forma_pagamento_ativa'=> 1)),

					'scripts' => array(
						'plugins/mask/jquery.mask.min.js',
						'plugins/mask/custom.js',
						'js/estacionar/custom.js'

					)
				);

//		echo 'pre';
//		print_r($data['parks']);die();

				$this->load->view('layout/header', $data);
				$this->load->view('parking/core');
				$this->load->view('layout/footer');
			}
		}

	}
}
