<section id="sec_tambah_a" class="mb-4">
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
                         <form method="POST" id="form-anggota">
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="username" class="col-sm-2">Username</label>
                                             <div class="col-sm-10">
                                                  <input type="text" name="username" id="username" class="form-control" value="<?= $anggota['username']; ?>" readonly>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="nama" class="col-sm-4">Nama</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="nama" id="nama" value="<?= $anggota['nama']; ?>" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="no_hp" class="col-sm-4">Nomor Hp</label>
                                             <div class="col-sm-8">
                                                  <input type="number" name="no_hp" id="no_hp" value="<?= $anggota['no_hp']; ?>" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="tempat_lahir" class="col-sm-4">Tempat Lahir</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="tempat_lahir" value="<?= $anggota['tempat_lahir']; ?>" id="tempat_lahir" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="tgl_lahir" class="col-sm-4">Tanggal Lahir</label>
                                             <div class="col-sm-8">
                                                  <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $anggota['tgl_lahir']; ?>" class="form-control" value="<?= date('Y-m-d') ?>">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="jkel" class="col-sm-2">Jenis Kelamin</label>
                                             <div class="col-sm-10">
                                                  <select name="jkel" id="jkel" class="form-control">
                                                       <option value="">-- Pilih --</option>
                                                       <option value="L">Laki-laki</option>
                                                       <option value="P">Perempuan</option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="alamat" class="col-sm-2">Alamat</label>
                                             <div class="col-sm-10">
                                                  <textarea name="alamat" id="alamat" class="form-control"><?= $anggota['alamat']; ?></textarea>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <button type="button" onclick="savey()" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>

<script>
     function back_page_before() {
          window.location.href = "<?= site_url('Anggota') ?>";
     }

     function savey() {
          var username = $('#username').val();
          var nama = $('#nama').val();
          var no_hp = $('#no_hp').val();
          var tempat_lahir = $('#tempat_lahir').val();
          var tgl_lahir = $('#tgl_lahir').val();
          var jkel = $('#jkel').val();
          var alamat = $('#alamat').val();
          if (username == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'USERNAME',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (nama == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (no_hp == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NOMOR HP',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (tempat_lahir == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'TEMPAT LAHIR',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (tgl_lahir == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'TANGGAL LAHIR',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (jkel == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'JENIS KELAMIN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (alamat == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'ALAMAT',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (username != '' && nama != '' && no_hp != '' && tempat_lahir != '' && tgl_lahir != '' && jkel != '' && alamat != '') {
               $.ajax({
                    url: "<?= site_url('Anggota/ubah_aksi/') ?>" + username,
                    data: $('#form-anggota').serialize(),
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'Sukses',
                                   text: 'Edit Data Berhasil !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Anggota";
                              });
                         } else {
                              Swal.fire({
                                   icon: 'error',
                                   title: 'Gagal',
                                   text: 'Edit Data Gagal !',
                              });
                         }
                    }
               });
          }
     }
</script>