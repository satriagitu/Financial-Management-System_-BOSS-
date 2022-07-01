<section id="buku_1" class="mb-4">
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
                         <form method="POST" id="form">
                              <div class="row justify-content-center">
                                   <div class="col-6">
                                        <div class="form-group row">
                                             <label for="uraian_kegiatan_belanja" class="col-sm-4">Uraian Kegiatan Belanja</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="uraian_kegiatan_belanja" id="uraian_kegiatan_belanja" value="<?php echo $value->uraian_kegiatan_belanja; ?>" class="form-control">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="tanggal" class="col-sm-4">Tanggal</label>
                                             <div class="col-sm-8">
                                                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d',strtotime($value->tanggal)); ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="no_kode" class="col-sm-4">No Kode</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="no_kode" id="no_kode" class="form-control" value="<?php echo $value->no_kode; ?>" >
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="no_bukti" class="col-sm-4">No Bukti</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="no_bukti" id="no_bukti" class="form-control" value="<?php echo $value->no_bukti; ?>" >
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="penerimaan" class="col-sm-4">Penerimaan</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="penerimaan" id="penerimaan" class="form-control" value="<?php echo $value->penerimaan; ?>" >
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="pengeluaran" class="col-sm-4">Pengeluaran</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="pengeluaran" id="pengeluaran" class="form-control" value="<?php echo $value->pengeluaran; ?>" >
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="kena_pajak" class="col-sm-4">Kena Pajak</label>
                                             <div class="col-sm-8">
                                                  <select name="kena_pajak" id="kena_pajak" class="form-control">
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                            foreach($kena_pajak as $row){
                                                                $selected = "";
                                                                if($row->id == $value->kena_pajak) $selected = "selected";
                                                                 echo "<option value=".$row->id." $selected>".$row->kena_pajak."</option>";
                                                            }
                                                        ?>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col-3 offset-3">
                                        <button type="button" onclick="save()" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
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
          window.location.href = "<?= site_url('Buku') ?>";
     }

     
     function save() {
          var uraian_kegiatan_belanja   = document.getElementById('uraian_kegiatan_belanja').value;
          var tanggal                   = document.getElementById('tanggal').value;
          var no_kode                   = document.getElementById('no_kode').value;
          var no_bukti                  = document.getElementById('no_bukti').value;
          var penerimaan                = document.getElementById('penerimaan').value;
          var pengeluaran               = document.getElementById('pengeluaran').value;
          var kena_pajak                = document.getElementById('kena_pajak').value;
          
          if (uraian_kegiatan_belanja == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Uraian Kegiatan Belanja',
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
          if (no_kode == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'No Kode',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (no_bukti == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'No Bukti',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (penerimaan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Penerimaan',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (pengeluaran == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Pengeluaran',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (kena_pajak == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Kena Pajak',
                    text: 'Tidak boleh kosong !',
               });
          }

          if (uraian_kegiatan_belanja != '' 
               && tanggal != ''
               && no_kode != ''
               && no_bukti != ''
               && penerimaan != ''
               && pengeluaran != ''
               && kena_pajak != ''
               ) {

               $.ajax({
                    url: "<?php echo base_url(); ?>Buku/save_edit/"+ "<?php echo $id; ?>",
                    type: "POST",
                    data: $("#form").serialize(),
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'Sukses',
                                   text: 'Save Data Berhasil !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Buku";
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
          }
     }
</script>