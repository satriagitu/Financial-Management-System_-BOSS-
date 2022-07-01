<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kwitansi extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          $this->load->model('M_kwitansi');
     }
     public function index()
     {
          $data = [
               'judul' => 'Kwitansi',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'data' => $this->M_kwitansi->get_kwitansi(),
          ];
          $this->template->load('Template/Content', 'Kwitansi/Data', $data);
     }
     public function tambah()
     {
          $data = [
               'judul' => 'Kwitansi',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Kwitansi/Tambah', $data);
     }

     public function edit($id)
     {
          $dt = $this->M_kwitansi->select($id);

          $data = [
               'judul' => 'Kwitansi',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'id' => $id,
               'data' => $dt,
          ];
          if(count($dt) > 0) $this->template->load('Template/Content', 'Kwitansi/Edit', $data);
          else header('location:'.base_url().'Kwitansi');
     }

     public function save_add()
     {
          $image_name = $_FILES["gambar"]['name'];
          $config['upload_path']     = 'assets/img/kwitansi/';
          $config['allowed_types']   = '*'; // 'jpg|png|jpeg|image/webp|webp';
          $config['max_size'] = '2048';
          $config['file_name']     = $image_name;
          $this->load->library('upload', $config);
          
          $this->upload->do_upload('gambar');
          // if ( ! $this->upload->do_upload('gambar'))
          // {
          //      $error = array('error' => $this->upload->display_errors());
          //      print_r($error);
          // }
          // else
          // {
          //      $data = array('upload_data' => $this->upload->data());
          //      print_r($data);
          // }
     
          $data = array(
               'nama_barang' => $this->input->post('nama_barang'),
               'tanggal' => $this->input->post('tanggal'),
               'image' => $this->upload->data('file_name'),
          );
          
          // print_r($data);

          $save = $this->M_kwitansi->save($data);

          if($save){               
			header('location:'.base_url().'Kwitansi');
          }
     }

     public function save_edit($id)
     {
          $image_name = $_FILES["gambar"]['name'];
          $config['upload_path']     = 'assets/img/kwitansi/';
          $config['allowed_types']   = '*'; // 'jpg|png|jpeg|image/webp|webp';
          $config['max_size'] = '2048';
          $config['file_name']     = $image_name;
          $this->load->library('upload', $config);
          
          $this->upload->do_upload('gambar');
          
          if ($_FILES["gambar"]["name"] != '') {
               $filename =  $this->upload->data('file_name');
          } else {
               $filename = $this->input->post('old_image');
          }
                    
          $data = array(
               'nama_barang' => $this->input->post('nama_barang'),
               'tanggal' => $this->input->post('tanggal'),
               'image' => $filename,
          );
     
          $where = array(
               'id' => $id,
          );
          
          $save = $this->M_kwitansi->update($data, $where);

          if($save){               
			header('location:'.base_url().'Kwitansi');
          }
     }

     public function delete($id)
     {          
          $where = array(
               'id' => $id,
          );
          
          $save = $this->M_kwitansi->delete($where);
          
          if($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }

}
