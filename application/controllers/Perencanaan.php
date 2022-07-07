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
               'uraian' => $this->input->post('uraian'),
               'triwulan' => $this->input->post('triwulan'),
               'volume' => $this->input->post('volume'),
               'satuan' => $this->input->post('satuan'),
               'harga_satuan' => $this->input->post('harga_satuan'),
          );

          $save = $this->M_perencanaan->save($data);

          if ($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
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
