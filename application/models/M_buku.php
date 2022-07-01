<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {
   
	var $table = 'buku';
	var $table_kena_pajak = 'm_kena_pajak';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function get_buku(){
		$query = "
			SELECT b.*, kp.kena_pajak as detail_kena_pajak 
            FROM `buku` b 
                LEFT JOIN m_kena_pajak kp ON b.kena_pajak = kp.id
            ";
	
		$qry = $this->db->query($query)->num_rows();

		if($qry > 0){
			return $this->db->query($query)->result();
		} else {
			return array();
		}
	}

    public function get_kena_pajak($id="")
	{
		$this->db->from($this->table_kena_pajak);
		$query = $this->db->get();

		return $query->result();
	}

    public function select($id){
        $this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
        
		return $query->result();
    }
    
    public function save($data){
        $this->db->insert($this->table, $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;					
        }
    }
    
    public function update($data, $where){
        $this->db->update($this->table, $data, $where);
        if($this->db->affected_rows() >= 0){
            return true;
        } else {
            return false;					
        }
    }
    
    public function delete($where){
        $this->db->delete($this->table, $where);
        if($this->db->affected_rows() >= 0){
            return true;
        } else {
            return false;					
        }
    }

}

