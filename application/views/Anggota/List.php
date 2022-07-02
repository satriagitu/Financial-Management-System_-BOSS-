<section id="perencanaan_1" class="mb-4">
     <div class="row">
          <div class="col">
               <div class="card">
                    <div class="card-body p-5">
                         <div>
                              <h3 class="text-primary">
                                   <?= strtoupper($judul); ?>
                                   <a type="button" href="#" class="btn btn-primary float-right my-auto" onclick="tambah_a()">
                                        <i class="fas fa-plus-circle"></i> Tambah Data
                                   </a>
                              </h3>
                         </div>
                         <hr>
                         <div class="row">
                              <div class="col">
                                   <div class="table-responsive">
                                        <table id="table-anggota" class="table table-striped table-bordered table-hover">
                                             <thead>
                                                  <tr class="text-center">
                                                       <th width="1%">No.</th>
                                                       <th>Profile</th>
                                                       <th>Username</th>
                                                       <th>Nama</th>
                                                       <th>Nomor Hp</th>
                                                       <th>Alamat</th>
                                                       <th>Tempat/Tgl Lahir</th>
                                                       <th>Tgl Bergabung</th>
                                                       <th>Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php $no = 1;
                                                  foreach ($anggota as $a) : ?>
                                                       <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td class="text-center">
                                                                 <img src="<?= base_url('assets/img/user/') . $a->gambar; ?>" width="30px" style="border-radius: 50%;">
                                                            </td>
                                                            <td><?= $a->username; ?></td>
                                                            <td><?= $a->nama; ?></td>
                                                            <td>
                                                                 <span class="float-right"><?= $a->no_hp; ?></span>
                                                            </td>
                                                            <td><?= $a->alamat; ?></td>
                                                            <td><?= $a->tempat_lahir . ' / ' . date('d-m-Y', strtotime($a->tgl_lahir)); ?></td>
                                                            <td><?= date('d-m-Y', strtotime($a->pembuatan)); ?></td>
                                                            <td class="text-center">
                                                                 <button class="btn btn-warning btn-sm btn-circle" type="button" title='Edit' onclick="ubah_a(<?= $a->id; ?>)"><i class='fas fa-pencil'></i></button>
                                                                 <?php if ($a->on_off == 1) : ?>
                                                                      <button class="btn btn-danger btn-sm btn-circle" type="button" title='Hapus' disabled><i class='fas fa-trash'></i></button>
                                                                 <?php else : ?>
                                                                      <button class="btn btn-danger btn-sm btn-circle" type="button" title='Hapus' onclick="hapus_a(<?= $a->id; ?>)"><i class='fas fa-trash'></i></button>
                                                                 <?php endif ?>
                                                            </td>
                                                       </tr>
                                                  <?php endforeach; ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</section>

<script>
     $(document).ready(function() {
          var table = $('#table-anggota').DataTable({
               "columnDefs": [{
                    "targets": [-1],
                    "orderable": false,
               }],
               "lengthMenu": [
                    [5, 20, 50, -1],
                    [5, 20, 50, 'semua']
               ],
               "oLanguage": {
                    "sEmptyTable": "<div class='text-center'>Data Kosong</div>",
                    "sInfoEmpty": "",
                    "sInfoFiltered": " - Dipilih dari _MAX_ data",
                    "sSearch": "Pencarian Data:",
                    "sInfo": " Jumlah _TOTAL_ Data (_START_ - _END_)",
                    "sLengthMenu": "_MENU_ Baris",
                    "sZeroRecords": "<div class='text-center'>Tida ada data</div>",
                    "oPaginate": {
                         "sPrevious": "Sebelumnya",
                         "sNext": "Berikutnya"
                    }
               },
               "scrollCollapse": false,
               "paging": true,
               "responsive": true,
          });
     });
</script>

<script>
     function tambah_a() {
          window.location.href = "<?= site_url('Anggota/tambah') ?>";
     }

     function ubah_a(id) {
          window.location.href = "<?= site_url('Anggota/ubah/') ?>" + id;
     }

     function hapus_a(id) {

          Swal.fire({
               title: 'Hapus',
               text: "Anda yakin ingin hapus data ini ?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Ya',
               cancelButtonText: 'Tidak',
          }).then((result) => {
               if (result.isConfirmed) {

                    $.ajax({
                         url: "<?php echo base_url(); ?>Anggota/delete/" + id,
                         type: "POST",
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status) {
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: 'Hapus Data Berhasil !',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Anggota";
                                   });
                              } else {
                                   Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Hapus Data Gagal !',
                                   });
                              }
                         }
                    });

               }
          });

     }
</script>