<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     public function index()
     {
          $data = [
               'judul' => 'Selamat Datang',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Beranda/Beranda', $data);
     }
}
