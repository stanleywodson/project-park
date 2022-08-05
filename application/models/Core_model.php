<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Core_model extends CI_Model 
{

    public function getAll($table = NULL, $condition = NULL)
    {
        if($table && $this->db->table_exists($table)){
            if(is_array($condition)){
                $this->db->where($condition);
            }

            return $this->db->get($table)->result();
        }else{
            return FALSE;
        }
    }

    public function getById($table = NULL, $condition = NULL)
    {
        if($table && $this->db->table_exists($table) && is_array($condition)){
            
            $this->db->where($condition);
            $this->db->limit(1);

            return $this->db->get($table)->row();
        }else{
            return FALSE;
        }
    }

    public function insert($table = NULL, $data = NULL, $getLastId = null)
    {
        if($table && $this->db->table_exists($table) && is_array($data)){

            $this->db->insert($table, $data);

			//Armazenando na sessão o ultimo id inserido
			if($getLastId){
				$this->session->set_userdata('last_id', $this->db->insert_id);
			}


            if($this->db->affected_rows() > 0){
                
                return true;
                
            }else{

                return false;
                
            }
            
        }else{
            return FALSE;
        }

    }

	public function update($table = NULL, $data = NULL, $condition = NULL)
	{
		if($table && $this->db->table_exists($table) && is_array($data) && is_array($condition)){

			$this->db->update($table, $data, $condition);

			if($this->db->affected_rows() > 0){

				return TRUE;

			}else{

				return FALSE;

			}

		}else{
			return FALSE;
		}

	}

	public function delete($table = NULL, $condition = NULL)
	{
		if($table && $this->db->table_exists($table) && is_array($condition)){

			if($this->db->delete($table, $condition)){

				$this->session->set_flashdata('sucesso', 'Deletado com sucesso!');
			}else{

				$this->session->set_flashdata('error', 'Não foi possivel excluir o registro!');
			}
		}else{
			return FALSE;
		}
	}



}

/* End of file Core_model.php */
