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
                                                  <tr>
                                                       <th scope="col">No</th>
                                                       <th scope="col">Standart Pendidikan</th>
                                                       <th scope="col">Nama Kegiatan</th>
                                                       <th scope="col">Program</th>
                                                       <th scope="col">Sub Program</th>
                                                       <th scope="col">Uraian</th>
                                                       <th scope="col">Triwulan</th>
                                                       <th scope="col">Volume</th>
                                                       <th scope="col">Satuan</th>
                                                       <th scope="col">Harga Satuan</th>
                                                       <th scope="col">Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                       $no = 0;
                                                       foreach($data as $row){
                                                            echo "                                   
                                                                      <tr>
                                                                           <th scope='row'>".($no+1)."</th>
                                                                           <td>$row->standar_pendidikan</td>
                                                                           <td>$row->nama_kegiatan</td>
                                                                           <td>$row->program</td>
                                                                           <td>$row->sub_program</td>
                                                                           <td>$row->uraian</td>
                                                                           <td>$row->triwulan</td>
                                                                           <td>$row->volume</td>
                                                                           <td>$row->satuan</td>
                                                                           <td>".number_format($row->harga_satuan,0,',','.')."</td>
                                                                           <td>
                                                                                <a href='".base_url().'Perencanaan/edit/'.$row->id."' class='btn btn-success btn-circle btn-sm' title='Edit'>
                                                                                     <i class='fas fa-pencil'></i>
                                                                                </a>
                                                                                <a href='#' onclick='hapus($row->id)' class='btn btn-danger btn-circle btn-sm' title='Hapus'>
                                                                                     <i class='fas fa-trash'></i>
                                                                                </a>
                                                                           </td>
                                                                      </tr>
                                                                 ";
                                                            $no++;
                                                       }
                                                  ?>
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
     
     function hapus(id){
          
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