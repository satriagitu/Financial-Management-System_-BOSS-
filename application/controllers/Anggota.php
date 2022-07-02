<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     public function index()
     {
          $data = [
               'judul' => 'Daftar Anggota',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'anggota' => $this->db->get('user')->result(),
          ];
          $this->template->load('Template/Content', 'Anggota/List', $data);
     }
     public function tambah()
     {
          $data = [
               'judul' => 'Tambah Anggota',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Anggota/Tambah', $data);
     }

     public function ubah($id)
     {
          $data = [
               'judul' => 'Ubah Anggota',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'anggota' => $this->db->get_where('user', ['id' => $id])->row_array(),
          ];
          $this->template->load('Template/Content', 'Anggota/Ubah', $data);
     }

     public function tambah_aksi()
     {
          $username = $this->input->post('username');
          $password = md5($this->input->post('password'));
          $nama = $this->input->post('nama');
          $no_hp = $this->input->post('no_hp');
          $tempat_lahir = $this->input->post('tempat_lahir');
          $tgl_lahir = $this->input->post('tgl_lahir');
          $jkel = $this->input->post('jkel');
          $id_role = $this->input->post('id_role');
          $alamat = $this->input->post('alamat');
          $data = [
               'username' => $username,
               'password' => $password,
               'nama' => $nama,
               'no_hp' => $no_hp,
               'tempat_lahir' => $tempat_lahir,
               'tgl_lahir' => $tgl_lahir,
               'jkel' => $jkel,
               'id_role' => $id_role,
               'alamat' => $alamat,
               'gambar' => 'default.png',
               'pembuatan' => date('Y-m-d', time()),
               'on_off' => 0,
          ];
          $cek = $this->db->get_where('user', ['username' => $username])->num_rows();
          if ($cek >= 1) {
               echo json_encode(['status' => 2]);
          } else {
               $this->db->insert('user', $data);
               echo json_encode(['status' => 1]);
          }
     }

     public function delete($id)
     {
          $where = array(
               'id' => $id,
          );

          $save = $this->db->delete('user', $where);

          if ($save) echo json_encode(array("status" => true));
          else echo json_encode(array("status" => false));
     }

     public function ubah_aksi($username)
     {
          $this->db->set('nama', $this->input->post('nama'));
          $this->db->set('no_hp', $this->input->post('no_hp'));
          $this->db->set('alamat', $this->input->post('alamat'));
          $this->db->set('tempat_lahir', $this->input->post('tempat_lahir'));
          $this->db->set('tgl_lahir', $this->input->post('tgl_lahir'));
          $this->db->set('jkel', $this->input->post('jkel'));
          $this->db->where('username', $username);
          $this->db->update('user');

          echo json_encode(array("status" => 1));
     }
}
