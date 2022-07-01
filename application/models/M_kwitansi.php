<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kwitansi extends CI_Model {
   
	var $table = 'kwitansi';
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function get_kwitansi(){
		$query = "
			SELECT *
            FROM `kwitansi`
            ";
        
		$qry = $this->db->query($query)->num_rows();

		if($qry > 0){
			return $this->db->query($query)->result();
		} else {
			return array();
		}
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

