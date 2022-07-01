<section id="perencanaan_1" class="mb-4">
     <div class="row">
          <div class="col">
               <div class="card">
                    <div class="card-body p-5">
                         <div>
                              <h3 class="text-primary">
                                   <?= strtoupper($judul); ?>
                                   <a type="button" href="#" class="btn btn-danger float-right my-auto" onclick="back_page_before()">
                                        <i class="fas fa-chevron-circle-left"></i> Kembali
                                   </a>
                              </h3>
                         </div>
                         <hr>
                         <?php
                            foreach($data as $value);
                         ?>
                         <form method="POST" id="form" enctype='multipart/form-data' action='<?php echo base_url('Kwitansi/save_edit/'.$id); ?>'>
                              <div class="row justify-content-center">
                                   <div class="col-6">
                                        <div class="form-group row">
                                             <label for="nama_barang" class="col-sm-4">Nama Barang</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $value->nama_barang; ?>" required>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="tanggal" class="col-sm-4">Tanggal</label>
                                             <div class="col-sm-8">
                                                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d',strtotime($value->tanggal)); ?>" required>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="exampleFormControlFile1"  class="col-sm-4">Image</label>
                                             <div class="col-sm-8">
                                                  <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1" >
                                                  <?php echo $value->image; ?>
                                                  <input type="hidden" name="old_image" value="<?php echo $value->image; ?>" />
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col-3 offset-3">
                                        <button type="submit" id="btn-upload" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>

<!-- kembali perencanaan -->
<script>
     function back_page_before() {
          window.location.href = "<?= site_url('Kwitansi') ?>";
     }

     
     function save() {
          var nama_barang   = document.getElementById('nama_barang').value;
          var tanggal       = document.getElementById('tanggal').value;
          // var image         = document.getElementById('image').value;
          
          if (nama_barang == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Nama Barang',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (tanggal == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Tanggal',
                    text: 'Tidak boleh kosong !',
               });
          }
          // if (image == '') {
          //      Swal.fire({
          //           icon: 'danger',
          //           title: 'Image',
          //           text: 'Tidak boleh kosong !',
          //      });
          // }

          if (nama_barang != '' 
               && tanggal != ''
               // && image != ''
               ) {
                    console.log('masuk');

                    $("#btn-upload").click(function(e) {
                         console.log(new FormData());
                         e.preventDefault();
                         $.ajax({
                              url: "<?php echo base_url(); ?>Kwitansi/save_add",
                              type: "POST",
                              data: new FormData(), // $("#form").serialize(),
                              dataType: "JSON",
                              success: function(data) {
                                   if (data.status) {
                                        Swal.fire({
                                             icon: 'success',
                                             title: 'Sukses',
                                             text: 'Save Data Berhasil !',
                                        }).then((value) => {
                                             location.href = "<?php echo base_url() ?>Kwitansi";
                                        });
                                   } else {
                                        Swal.fire({
                                             icon: 'danger',
                                             title: 'Gagal',
                                             text: 'Save Data Gagal !',
                                        });
                                   }
                              }
                         });
                    });
               

          }
     }

</script>