<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <title><?= $judul; ?></title>
     <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
     <link href="<?= base_url('assets/'); ?>fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/css/jquery.dataTables.min.css" type="text/css">
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/css/dataTables.bootstrap4.min.css" type="text/css">
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/css/buttons.bootstrap4.min.css" type="text/css">
     <script src="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.min.css">
     <!-- jquery -->
     <script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
     <!-- chart js -->
     <script type="text/javascript" src="<?= base_url('assets'); ?>/js/Chart.js"></script>
     <script src="<?= base_url('assets'); ?>/js/jquery-3.5.1.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/select2/dist/css/select2.min.css">
     <script src="<?= base_url('assets'); ?>/select2/dist/js/select2.min.js" type="text/javascript"></script>
</head>

<body id="page-top">
     <?php
     if ($this->session->userdata('username') == null)
          header('location:' . base_url());
     ?>
     <div id="wrapper">
          <?php if ($this->uri->segment(1) == 'Penjualan') { ?>
               <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion hold-transition sidebar-mini 1 sidebar-toggled 1 toggled" id="accordionSidebar">
               <?php } else { ?>
                    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                    <?php } ?>
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Home'); ?>">
                         <div class="sidebar-brand-icon">
                              <img src="<?= base_url('assets/img/logo-sd.png') ?>" class="rounded mt-5" style="width: 70px;">
                              <?php
                              // echo $user;
                              // echo $this->session->userdata('username'); 
                              ?>
                         </div>
                         <div class="sidebar-brand-text mx-3"></div>
                    </a>
                    <hr class="sidebar-divider my-0 mt-5">
                    <?php if ($this->uri->segment(1) == 'Anggota') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Anggota'); ?>">
                                   <i class="fas fa-fw fa-users"></i>
                                   <span>Anggota</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Anggota'); ?>">
                                   <i class="fas fa-fw fa-users"></i>
                                   <span>Anggota</span>
                              </a>
                         </li>
                    <?php endif; ?>
                    <?php if ($this->uri->segment(1) == 'Role') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Role'); ?>">
                                   <i class="fas fa-fw fa-user-tag"></i>
                                   <span>Role</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Role'); ?>">
                                   <i class="fas fa-fw fa-user-tag"></i>
                                   <span>Role</span>
                              </a>
                         </li>
                    <?php endif; ?>
                    <hr class="sidebar-divider my-0">
                    <?php if ($this->uri->segment(1) == 'Beranda') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Beranda'); ?>">
                                   <i class="fas fa-fw fa-tachometer-alt"></i>
                                   <span>Beranda</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Beranda'); ?>">
                                   <i class="fas fa-fw fa-tachometer-alt"></i>
                                   <span>Beranda</span>
                              </a>
                         </li>
                    <?php endif; ?>
                    <hr class="sidebar-divider my-0">
                    <?php if ($this->uri->segment(1) == 'Perencanaan') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Perencanaan'); ?>">
                                   <i class="fas fa-fw fa-th-list"></i>
                                   <span>Perencanaan</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Perencanaan'); ?>">
                                   <i class="fas fa-fw fa-th-list"></i>
                                   <span>Perencanaan</span>
                              </a>
                         </li>
                    <?php endif; ?>
                    <hr class="sidebar-divider my-0">
                    <?php if ($this->uri->segment(1) == 'Buku') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Buku'); ?>">
                                   <i class="fas fa-fw fa-bookmark"></i>
                                   <span>BKU</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Buku'); ?>">
                                   <i class="fas fa-fw fa-bookmark"></i>
                                   <span>BKU</span>
                              </a>
                         </li>
                    <?php endif; ?>
                    <hr class="sidebar-divider my-0">
                    <?php if ($this->uri->segment(1) == 'Kwitansi') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Kwitansi'); ?>">
                                   <i class="fas fa-fw fa-receipt"></i>
                                   <span>Kwitansi</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Kwitansi'); ?>">
                                   <i class="fas fa-fw fa-receipt"></i>
                                   <span>Kwitansi</span>
                              </a>
                         </li>
                    <?php endif; ?>
                    <hr class="sidebar-divider my-0">
                    <?php if ($this->uri->segment(1) == 'Laporan') : ?>
                         <li class="nav-item active">
                              <a class="nav-link" href="<?= site_url('Laporan'); ?>">
                                   <i class="fas fa-fw fa-book-open"></i>
                                   <span>Laporan</span>
                              </a>
                         </li>
                    <?php else : ?>
                         <li class="nav-item">
                              <a class="nav-link" href="<?= site_url('Laporan'); ?>">
                                   <i class="fas fa-fw fa-book-open"></i>
                                   <span>Laporan</span>
                              </a>
                         </li>
                    <?php endif; ?>

                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="text-center d-none d-md-inline">
                         <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>
                    </ul>
                    <div id="content-wrapper" class="d-flex flex-column">
                         <div id="content">
                              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                                   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                        <i class="fa fa-bars"></i>
                                   </button>
                                   <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown no-arrow mx-1">
                                             <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <i class="fas fa-bell fa-fw"></i>
                                                  <!-- Counter - Alerts -->
                                                  <span class="badge badge-danger badge-counter">3+</span>
                                             </a>
                                             <!-- Dropdown - Alerts -->
                                             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                                  <h6 class="dropdown-header">
                                                       Alerts Center
                                                  </h6>
                                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                                       <div class="mr-3">
                                                            <div class="icon-circle bg-primary">
                                                                 <i class="fas fa-file-alt text-white"></i>
                                                            </div>
                                                       </div>
                                                       <div>
                                                            <div class="small text-gray-500">December 12, 2019</div>
                                                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                                       </div>
                                                  </a>
                                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                                       <div class="mr-3">
                                                            <div class="icon-circle bg-success">
                                                                 <i class="fas fa-donate text-white"></i>
                                                            </div>
                                                       </div>
                                                       <div>
                                                            <div class="small text-gray-500">December 7, 2019</div>
                                                            $290.29 has been deposited into your account!
                                                       </div>
                                                  </a>
                                                  <a class="dropdown-item d-flex align-items-center" href="#">
                                                       <div class="mr-3">
                                                            <div class="icon-circle bg-warning">
                                                                 <i class="fas fa-exclamation-triangle text-white"></i>
                                                            </div>
                                                       </div>
                                                       <div>
                                                            <div class="small text-gray-500">December 2, 2019</div>
                                                            Spending Alert: We've noticed unusually high spending for your account.
                                                       </div>
                                                  </a>
                                                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                             </div>
                                        </li>
                                        <div class="topbar-divider d-none d-sm-block"></div>
                                        <li class="nav-item dropdown no-arrow">
                                             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                                       <b><?= strtoupper($user['username']); ?></b>
                                                  </span>
                                                  <img class="img-profile rounded-circle" src="<?= base_url('assets/img/default.png') ?>">
                                             </a>
                                             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                  <a class="dropdown-item" href="#" type="button">
                                                       <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                       Profile
                                                  </a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" onclick="keluar()" type="button">
                                                       <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                       Keluar
                                                  </a>
                                             </div>
                                        </li>
                                   </ul>
                              </nav>
                              <div class="container-fluid">
                                   <?= $content; ?>
                              </div>
                         </div>
                         <footer class="sticky-footer bg-white">
                              <div class="container my-auto">
                                   <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; SKRIPSI UNIMMA 2022</span>
                                   </div>
                              </div>
                         </footer>
                    </div>
     </div>
     <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
     </a>
     <script>
          function keluar() {
               Swal.fire({
                    title: 'KELUAR',
                    text: "Anda yakin ingin keluar ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Keluar',
                    cancelButtonText: 'Tidak',
               }).then((result) => {
                    if (result.isConfirmed) {
                         location.href = "<?php echo base_url() ?>Auth/keluar";
                    }
               });
          }
     </script>
     <script src="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/js/dataTables.bootstrap4.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.bootstrap4.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/JSZip-2.5.0/jszip.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/pdfmake-0.1.36/pdfmake.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/pdfmake-0.1.36/vfs_fonts.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.html5.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.print.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.colVis.min.js"></script>
     <script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
     <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>
     <script src="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.all.min.js"></script>

</body>

</html>