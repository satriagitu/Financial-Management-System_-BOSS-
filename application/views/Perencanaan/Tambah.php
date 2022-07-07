<section id="perencanaan_1" class="mb-4">
     <div class="row">
          <div class="col">
               <div class="card">
                    <div class="card-body p-5">
                         <div>
                              <h3 class="text-primary">
                                   <?= strtoupper($judul); ?>
                                   <a type="button" href="#" class="btn btn-danger float-right my-auto" onclick="kembali_perencanaan()">
                                        <i class="fas fa-chevron-circle-left"></i> Kembali
                                   </a>
                              </h3>
                         </div>
                         <hr>
                         <form method="POST" id="form">
                              <div class="row justify-content-center">
                                   <div class="col-6">
                                        <div class="form-group row">
                                             <label for="pendidikan" class="col-sm-4">Standar Pendidikan</label>
                                             <div class="col-sm-8">
                                                  <select name="standar_pendidikan" id="standar_pendidikan" class="form-control select2_standar">
                                                       <option value="">-- Pilih --</option>
                                                       <?php
                                                       foreach ($standar_pendidikan as $row) {
                                                            echo "<option value=" . $row->id . ">" . $row->standar_pendidikan . "</option>";
                                                       }
                                                       ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="kegiatan" class="col-sm-4">Nama Kegiatan</label>
                                             <div class="col-sm-8">
                                                  <select name="nama_kegiatan" id="nama_kegiatan" class="form-control select2_nama_kegiatan">
                                                       <option value="">-- Pilih --</option>
                                                       <?php
                                                       foreach ($nama_kegiatan as $row) {
                                                            echo "<option value=" . $row->id . ">" . $row->nama_kegiatan . "</option>";
                                                       }
                                                       ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="program" class="col-sm-4">Program</label>
                                             <div class="col-sm-8">
                                                  <select name="program" id="program" class="form-control select2_program">
                                                       <option value="">-- Pilih --</option>
                                                       <?php
                                                       foreach ($program as $row) {
                                                            echo "<option value=" . $row->id . ">" . $row->program . "</option>";
                                                       }
                                                       ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="subprogram" class="col-sm-4">Subprogram</label>
                                             <div class="col-sm-8">
                                                  <select name="sub_program" id="sub_program" class="form-control select2_sub_program">
                                                       <option value="">-- Pilih --</option>
                                                       <?php
                                                       foreach ($sub_program as $row) {
                                                            echo "<option value=" . $row->id . ">" . $row->sub_program . "</option>";
                                                       }
                                                       ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="triwulan" class="col-sm-4">Triwulan</label>
                                             <div class="col-sm-8">
                                                  <select name="triwulan" id="triwulan" class="form-control">
                                                       <option value="">-- Pilih --</option>
                                                       <?php
                                                       foreach ($triwulan as $row) {
                                                            echo "<option value=" . $row->id . ">" . $row->triwulan . "</option>";
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
     $(".select2_standar").select2();
     $(".select2_nama_kegiatan").select2();
     $(".select2_program").select2();
     $(".select2_sub_program").select2();

     function kembali_perencanaan() {
          window.location.href = "<?= site_url('Perencanaan') ?>";
     }

     function save() {
          var standar_pendidikan = document.getElementById('standar_pendidikan').value;
          var nama_kegiatan = document.getElementById('nama_kegiatan').value;
          var program = document.getElementById('program').value;
          var sub_program = document.getElementById('sub_program').value;
          var uraian = document.getElementById('uraian').value;
          var triwulan = document.getElementById('triwulan').value;
          var volume = document.getElementById('volume').value;
          var satuan = document.getElementById('satuan').value;
          var harga_satuan = document.getElementById('harga_satuan').value;

          if (standar_pendidikan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Standar Pendidikan',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (nama_kegiatan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Nama Kegiatan',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (program == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Program',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (sub_program == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Sub Program',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (uraian == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Uraian',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (triwulan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Triwulan',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (volume == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Volume',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (harga_satuan == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'Harga Satuan',
                    text: 'Tidak boleh kosong !',
               });
          }

          if (standar_pendidikan != '' &&
               nama_kegiatan != '' &&
               program != '' &&
               sub_program != '' &&
               uraian != '' &&
               triwulan != '' &&
               volume != '' &&
               satuan != '' &&
               harga_satuan != ''
          ) {

               $.ajax({
                    url: "<?php echo base_url(); ?>Perencanaan/save_add",
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
                                   location.href = "<?php echo base_url() ?>Perencanaan";
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