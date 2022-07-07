<section id="perencanaan_1" class="mb-4">
     <div class="row">
          <div class="col">
               <div class="card">
                    <div class="card-body p-5">
                         <div>
                              <h3 class="text-primary">
                                   <?= strtoupper($judul); ?>
                                   <a type="button" href="#" class="btn btn-primary float-right my-auto" onclick="tambah_perencanaan()">
                                        <i class="fas fa-plus-circle"></i> Tambah Data
                                   </a>
                              </h3>
                         </div>
                         <hr>
                         <div class="row">
                              <div class="col">
                                   <div class="table-responsive">
                                        <table id="table-perencanaan" class="table table-striped table-bordered table-hover">
                                             <thead>
                                                  <tr class="text-center">
                                                       <th width="1%">No</th>
                                                       <th>Standart Pendidikan</th>
                                                       <th>Nama Kegiatan</th>
                                                       <th>Program</th>
                                                       <th>Sub Program</th>
                                                       <th>Triwulan</th>
                                                       <th width="10%">Subtotal</th>
                                                       <th width="10%">Total</th>
                                                       <th width="10%">Aksi</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  $no = 1;
                                                  foreach ($data as $row) : ?>
                                                       <tr>
                                                            <th><?= $no++; ?></th>
                                                            <td><?= $row->standar_pendidikan; ?></td>
                                                            <td><?= $row->nama_kegiatan; ?></td>
                                                            <td><?= $row->program; ?></td>
                                                            <td><?= $row->sub_program; ?></td>
                                                            <td class="text-right"><?= $row->triwulan; ?></td>
                                                            <td>
                                                                 Rp. <span class="float-right"><?= number_format($row->subtotal); ?></span>
                                                            </td>
                                                            <td>
                                                                 Rp. <span class="float-right"><?= number_format($row->total); ?></span>
                                                            <td class="text-center">
                                                                 <a href="<?= site_url('Perencanaan/edit/') . $row->id; ?>" class='btn btn-success btn-circle btn-sm' title='Edit'>
                                                                      <i class='fas fa-pencil'></i>
                                                                 </a>
                                                                 <a href='#' onclick='hapus(<?= $row->id; ?>)' class='btn btn-danger btn-circle btn-sm' title='Hapus'>
                                                                      <i class='fas fa-trash'></i>
                                                                 </a>
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

<!-- datatable -->
<script>
     $(document).ready(function() {
          var table = $('#table-perencanaan').DataTable({
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

<!-- tambah perencanaan -->
<script>
     function tambah_perencanaan() {
          window.location.href = "<?= site_url('Perencanaan/tambah') ?>";
     }

     function hapus(id) {

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
                         url: "<?php echo base_url(); ?>Perencanaan/delete/" + id,
                         type: "POST",
                         data: $("#form").serialize(),
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status) {
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: 'Hapus Data Berhasil !',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Perencanaan";
                                   });
                              } else {
                                   Swal.fire({
                                        icon: 'danger',
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