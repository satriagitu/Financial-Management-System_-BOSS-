<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
		$this->load->model('M_buku');
     }
     
     public function index()
     {
          $data = [
               'judul' => 'BKU (Buku Kas Umum)',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'data' => $this->M_buku->get_buku(),
          ];
          $this->template->load('Template/Content', 'Buku/Data', $data);
     }
     
     public function tambah()
     {  
          $data = [
               'judul' => 'BKU (Buku Kas Umum)',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'kena_pajak' => $this->M_buku->get_kena_pajak(),
          ];
          $this->template->load('Template/Content', 'Buku/Tambah', $data);
     }
     
     public function edit($id)
     {
          $dt = $this->M_buku->select($id);

          $data = [
               'judul' => 'BKU (Buku Kas Umum)',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'id' => $id,
               'data' => $dt,
               'kena_pajak' => $this->M_buku->get_kena_pajak(),
          ];
          if(count($dt) > 0) $this->template->load('Template/Content', 'Buku/Edit', $data);
          else header('location:'.base_url().'Buku');
     }
     
     public function delete($id)
     {          
          $where = array(
               'id' => $id,
          );
          
          $save = $this->M_buku->delete($where);
          
          if($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }
     
     public function save_add()
     {
          $data = array(
               'uraian_kegiatan_belanja' => $this->input->post('uraian_kegiatan_belanja'),
               'tanggal' => $this->input->post('tanggal'),
               'no_kode' => $this->input->post('no_kode'),
               'no_bukti' => $this->input->post('no_bukti'),
               'penerimaan' => $this->input->post('penerimaan'),
               'pengeluaran' => $this->input->post('pengeluaran'),
               'kena_pajak' => $this->input->post('kena_pajak'),
          );
          
          $save = $this->M_buku->save($data);

          if($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }
     
     public function save_edit($id)
     {
          $data = array(
               'uraian_kegiatan_belanja' => $this->input->post('uraian_kegiatan_belanja'),
               'tanggal' => $this->input->post('tanggal'),
               'no_kode' => $this->input->post('no_kode'),
               'no_bukti' => $this->input->post('no_bukti'),
               'penerimaan' => $this->input->post('penerimaan'),
               'pengeluaran' => $this->input->post('pengeluaran'),
               'kena_pajak' => $this->input->post('kena_pajak'),
          );

          $where = array(
               'id' => $id,
          );
          
          $save = $this->M_buku->update($data, $where);
          
          if($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }

}
