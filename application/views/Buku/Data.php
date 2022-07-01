<section id="perencanaan_1" class="mb-4">
     <div class="row">
          <div class="col">
               <div class="card">
                    <div class="card-body p-5">
                         <div>
                              <h3 class="text-primary">
                                   <?= strtoupper($judul); ?>
                                   <a type="button" href="#" class="btn btn-primary float-right my-auto" onclick="tambah_data()">
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
                                                       <th scope="col">No.</th>
                                                       <th scope="col">Uraian Kegiatan Belanja</th>
                                                       <th scope="col">Tanggal</th>
                                                       <th scope="col">No Kode</th>
                                                       <th scope="col">No Bukti</th>
                                                       <th scope="col">Penerimaan</th>
                                                       <th scope="col">Pengeluaran</th>
                                                       <th scope="col">Kena Pajak</th>
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
                                                                           <td>$row->uraian_kegiatan_belanja</td>
                                                                           <td>".date('d-m-Y',strtotime($row->tanggal))."</td>
                                                                           <td>$row->no_kode</td>
                                                                           <td>$row->no_bukti</td>
                                                                           <td>".number_format($row->penerimaan,0,',','.')."</td>
                                                                           <td>".number_format($row->pengeluaran,0,',','.')."</td>
                                                                           <td>$row->detail_kena_pajak</td>
                                                                           <td>
                                                                                <a href='".base_url().'Buku/edit/'.$row->id."' class='btn btn-success btn-circle btn-sm' title='Edit'>
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
     function tambah_data() {
          window.location.href = "<?= site_url('Buku/tambah') ?>";
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
                         url: "<?php echo base_url(); ?>Buku/delete/" + id,
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
                                        location.href = "<?php echo base_url() ?>Buku";
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