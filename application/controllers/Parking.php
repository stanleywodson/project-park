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
//		print_r($data['parks']);die();

		$this->load->view('layout/header', $data);
		$this->load->view('parking/index');
		$this->load->view('layout/footer');
	}

	public function core($park_id = null)
	{
		if(!$park_id){
			//cadastrar
			$this->form_validation->set_rules('estacionar_precificacao_id', 'Categoria ', 'required');
			$this->form_validation->set_rules('estacionar_numero_vaga', 'Número da vaga', 'required|greater_than[0]|callback_check_vaga_ocupada|callback_check_range_vagas_categoria');
			$this->form_validation->set_rules('estacionar_placa_veiculo', 'placa veículo ', 'required|exact_length[8]|callback_check_placa_status_aberta');
			$this->form_validation->set_rules('estacionar_marca_veiculo', 'Marca veículo ', 'required|min_length[2]|max_length[30]');
			$this->form_validation->set_rules('estacionar_modelo_veiculo', 'Modelo veículo ', 'required|min_length[2]|max_length[20]');

			if ($this->form_validation->run()){

//					echo 'pre';
//					print_r($this->input->post());die();

				$data = elements(
					array(
						'estacionar_valor_hora',
						'estacionar_numero_vaga',
						'estacionar_placa_veiculo',
						'estacionar_marca_veiculo',
						'estacionar_modelo_veiculo'
					),
					$this->input->post()
				);

				$data['estacionar_precificacao_id'] = intval(substr($this->input->post('estacionar_precificacao_id'), 0, 1));
				$data['estacionar_status'] = 0;

				$data = html_escape($data);
				$this->core_model->insert('estacionar', $data, TRUE);
				$estacionar_id = $this->session->userdata('last_id');
				redirect($this->router->fetch_class().'/acoes/'.$estacionar_id);

				//criar metodo imprimir
			}else{
				$data = array(

					'title' => 'Cadastrar Ticket',
					'subtitle' => 'cadastrar novo ticket',
					'texto_modal' =>'tem certeza que deseja salvar esse ticket? Não será possível alterá-lo',
					'estacionado' => $this->core_model->getById('estacionar',  array('estacionar_id'=> $park_id)),
					'precificacoes' =>  $this->core_model->getAll('precificacoes',  array('precificacao_ativa'=> 1)),

					'scripts' => array(
						'plugins/mask/jquery.mask.min.js',
						'plugins/mask/custom.js',
						'js/estacionar/custom.js'

					)
				);



				$this->load->view('layout/header', $data);
				$this->load->view('parking/core');
				$this->load->view('layout/footer');
			}
		}else{


			if(!$this->core_model->getById('estacionar', array('estacionar_id'=> $park_id))){
				$this->session->set_flashdata('error', 'ticket nao encontrado para encerramento');
				redirect($this->router->fetch_class());
			}else{
				//Encerramento

				$estacionarTempoDecorrido = str_replace('.', '', $this->input->post('estacionar_tempo_decorrido'));

				if ($estacionarTempoDecorrido > '015'){
				$this->form_validation->set_rules('estacionar_forma_pagamento_id', 'Forma de Pagamento', 'required');
				}

				if ($this->form_validation->run()){
//					echo 'pre';
//					print_r($this->input->post());die();
					$data = elements(
						array(
							'estacionar_valor_devido',
							'estacionar_forma_pagamento_id',
							'estacionar_tempo_decorrido'
						),
						$this->input->post()
					);

					if ($estacionarTempoDecorrido <= '015'){
						$data['estacionar_forma_pagamento_id'] = 6; //pagamento grátis
					}
					$data['estacionar_data_saida'] = date('Y-m-d H:i:s');
					$data['estacionar_status'] = 1;

					$data = html_escape($data);
					$this->core_model->update('estacionar', $data, array('estacionar_id' => $park_id));
					redirect($this->router->fetch_class().'/acoes/'.$park_id);

					//criar metodo imprimir
				}else{
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



				$this->load->view('layout/header', $data);
				$this->load->view('parking/core');
				$this->load->view('layout/footer');
				}

			}
		}

	}

	public function check_range_vagas_categoria($numero_vaga) {

		$precificacao_id = intval(substr($this->input->post('estacionar_precificacao_id'), 0, 1));

		if ($precificacao_id) {

			$precificacao = $this->core_model->getById('precificacoes', array('precificacao_id' => $precificacao_id));

			if ($precificacao->precificacao_numero_vagas < $numero_vaga) {

				$this->form_validation->set_message('check_range_vagas_categoria', 'A vaga deve estar entre 1 e ' . $precificacao->precificacao_numero_vagas);

				return FALSE;
			} else {

				return TRUE;
			}
		} else {
			$this->form_validation->set_message('check_range_vagas_categoria', 'Escolha uma categoria');
			return FALSE;
		}
	}

	public function check_vaga_ocupada($estacionar_numero_vaga) {

		$estacionar_precificacao_id = intval(substr($this->input->post('estacionar_precificacao_id'), 0, 1));

		if ($this->core_model->getById('estacionar', array('estacionar_numero_vaga' => $estacionar_numero_vaga, 'estacionar_status' => 0, 'estacionar_precificacao_id' => $estacionar_precificacao_id))) {

			$this->form_validation->set_message('check_vaga_ocupada', 'Essa vaga já está ocupada para essa categoria');

			return FALSE;
		} else {

			return TRUE;
		}
	}

	public function check_placa_status_aberta($estacionar_placa_veiculo) {

		$estacionar_placa_veiculo = strtoupper($estacionar_placa_veiculo);

		if ($this->core_model->getById('estacionar', array('estacionar_placa_veiculo' => $estacionar_placa_veiculo, 'estacionar_status' => 0))) {

			$this->form_validation->set_message('check_placa_status_aberta', 'Existe uma ordem aberta para essa placa');

			return FALSE;
		} else {

			return TRUE;
		}
	}

	public function acoes($estacionar_id = null)
	{
		if (!$this->core_model->getById('estacionar', array('estacionar_id' => $estacionar_id))){
			$this->session->set_flashdata('error', 'Ticket não encontrado!');
			redirect($this->router->fetch_class());
		}else{
			$data = array(

				'title' => 'o que você gostaria de fazer ?',
				'subtitle' => 'Escolha umas das opções a seguir',
				'estacionado' => $this->core_model->getById('estacionar',  array('estacionar_id'=> $estacionar_id)),

				'scripts' => array(
					'plugins/mask/jquery.mask.min.js',
					'plugins/mask/custom.js',
					'js/estacionar/custom.js'

				)
			);



			$this->load->view('layout/header', $data);
			$this->load->view('parking/acoes');
			$this->load->view('layout/footer');
		}
	}

}
