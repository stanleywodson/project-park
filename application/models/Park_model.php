<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Park_model extends CI_Model
{
	public function getAll()
	{
		$this->db->select([
			'estacionar.*',
			'precificacoes.precificacao_id',
			'precificacoes.precificacao_valor_hora',
			'precificacoes.precificacao_categoria',
			'formas_pagamentos.forma_pagamento_id',
			'formas_pagamentos.forma_pagamento_nome',
		]);

		$this->db->join('precificacoes', 'precificacao_id = estacionar_precificacao_id', 'LEFT');
		$this->db->join('formas_pagamentos', 'forma_pagamento_id = estacionar_forma_pagamento_id', 'LEFT');

		return $this->db->get('estacionar')->result();
	}
}
