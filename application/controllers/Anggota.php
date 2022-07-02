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
}
