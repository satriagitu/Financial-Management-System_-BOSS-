<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perencanaan extends CI_Model {
   
	var $table = 'perencanaan';
	var $table_standar_pendidikan = 'm_standar_pendidikan';
	var $table_nama_kegiatan = 'm_nama_kegiatan';
	var $table_program = 'm_program';
	var $table_sub_program = 'm_sub_program';
	var $table_triwulan = 'm_triwulan';
	var $table_satuan = 'm_satuan';
		
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}

	public function get_perencanaan(){
		$query = "
			SELECT p.id, sp.standar_pendidikan, nk.nama_kegiatan, pr.program, spr.sub_program, p.uraian, t.triwulan, p.volume, s.satuan, p.harga_satuan
            FROM `perencanaan` p
                LEFT JOIN m_standar_pendidikan sp ON p.standar_pendidikan = sp.id
                LEFT JOIN m_nama_kegiatan nk ON p.nama_kegiatan = nk.id
                LEFT JOIN m_program pr ON p.program = pr.id
                LEFT JOIN m_sub_program spr ON p.sub_program = spr.id
                LEFT JOIN m_triwulan t ON p.triwulan = t.id
                LEFT JOIN m_satuan s ON p.satuan = s.id;
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

	public function get_standar_pendidikan($id="")
	{
		$this->db->from($this->table_standar_pendidikan);
		$query = $this->db->get();

		return $query->result();
	}
    
	public function get_nama_kegiatan($id="")
	{
		$this->db->from($this->table_nama_kegiatan);
		$query = $this->db->get();

		return $query->result();
	}
    
	public function get_program($id="")
	{
		$this->db->from($this->table_program);
		$query = $this->db->get();

		return $query->result();
	}

	public function get_sub_program($id="")
	{
		$this->db->from($this->table_sub_program);
		$query = $this->db->get();

		return $query->result();
	}
    
	public function get_triwulan($id="")
	{
		$this->db->from($this->table_triwulan);
		$query = $this->db->get();

		return $query->result();
	}
    
	public function get_satuan($id="")
	{
		$this->db->from($this->table_satuan);
		$query = $this->db->get();

		return $query->result();
	}


}

