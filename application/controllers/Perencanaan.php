<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perencanaan extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          $this->load->model('M_perencanaan');
     }

     public function index()
     {
          $data = [
               'judul' => 'Perencanaan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'data' => $this->M_perencanaan->get_perencanaan(),
          ];
          $this->template->load('Template/Content', 'Perencanaan/Data', $data);
     }

     public function data_detail()
     {
          $id = $this->input->get('id_perencanaan');
          $data = $this->db->get_where('perencanaan_uraian', ['id_perencanaan' => $id])->row_array();
          echo json_encode($data);
     }

     public function tambah()
     {
          $data = [
               'judul' => 'Perencanaan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'standar_pendidikan' => $this->M_perencanaan->get_standar_pendidikan(),
               'nama_kegiatan' => $this->M_perencanaan->get_nama_kegiatan(),
               'program' => $this->M_perencanaan->get_program(),
               'sub_program' => $this->M_perencanaan->get_sub_program(),
               'triwulan' => $this->M_perencanaan->get_triwulan(),
               'satuan' => $this->M_perencanaan->get_satuan(),
          ];
          $this->template->load('Template/Content', 'Perencanaan/Tambah', $data);
     }

     public function edit($id)
     {
          $dt = $this->M_perencanaan->select($id);

          $data = [
               'judul' => 'Perencanaan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'id' => $id,
               'data' => $dt,
               'standar_pendidikan' => $this->M_perencanaan->get_standar_pendidikan(),
               'nama_kegiatan' => $this->M_perencanaan->get_nama_kegiatan(),
               'program' => $this->M_perencanaan->get_program(),
               'sub_program' => $this->M_perencanaan->get_sub_program(),
               'triwulan' => $this->M_perencanaan->get_triwulan(),
               'satuan' => $this->M_perencanaan->get_satuan(),
          ];
          if (count($dt) > 0) $this->template->load('Template/Content', 'Perencanaan/Edit', $data);
          else header('location:' . base_url() . 'Perencanaan');
     }

     public function delete($id)
     {
          $where = array(
               'id' => $id,
          );

          $save = $this->M_perencanaan->delete($where);

          if ($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }

     public function save_add()
     {
          $data = array(
               'standar_pendidikan' => $this->input->post('standar_pendidikan'),
               'nama_kegiatan' => $this->input->post('nama_kegiatan'),
               'program' => $this->input->post('program'),
               'sub_program' => $this->input->post('sub_program'),
               'triwulan' => $this->input->post('triwulan'),
               'subtotal' => $this->input->get('subtotal'),
               'total' => $this->input->get('total'),
          );

          $this->M_perencanaan->save($data);
          echo json_encode(['status' => 1]);
     }
     public function detail()
     {
          $get_id = $this->db->query("SELECT id FROM perencanaan order by id desc limit 1")->result();
          foreach ($get_id as $gi) {
               $id_perencanaan = $gi->id;
          }
          $namabarang = $this->input->get('namabarang');
          $satuan = $this->input->get('satuan');
          $qty = $this->input->get('qty');
          $harga = $this->input->get('harga');
          $jumlah = $this->input->get('jumlah');
          $data = [
               'id_perencanaan' => $id_perencanaan,
               'namabarang' => $namabarang,
               'satuan' => $satuan,
               'qty' => $qty,
               'harga' => $harga,
               'jumlah' => $jumlah,
          ];
          $this->db->insert('perencanaan_uraian', $data);
     }

     public function save_edit($id)
     {
          $data = array(
               'standar_pendidikan' => $this->input->post('standar_pendidikan'),
               'nama_kegiatan' => $this->input->post('nama_kegiatan'),
               'program' => $this->input->post('program'),
               'sub_program' => $this->input->post('sub_program'),
               'uraian' => $this->input->post('uraian'),
               'triwulan' => $this->input->post('triwulan'),
               'volume' => $this->input->post('volume'),
               'satuan' => $this->input->post('satuan'),
               'harga_satuan' => $this->input->post('harga_satuan'),
          );

          $where = array(
               'id' => $id,
          );

          $save = $this->M_perencanaan->update($data, $where);

          if ($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }
}
