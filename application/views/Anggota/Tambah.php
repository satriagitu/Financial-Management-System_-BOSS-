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
                                             <label for="username" class="col-sm-4">Username</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="username" id="username" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="password" class="col-sm-4">Password</label>
                                             <div class="col-sm-8">
                                                  <div class="input-group mb-2 mr-sm-2">
                                                       <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                 <input class="input-group-text" type="checkbox" id="showpass" onclick="showpassword()">
                                                            </div>
                                                       </div>
                                                       <input type="password" class="form-control" id="password" name="password">
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="nama" class="col-sm-4">Nama</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="nama" id="nama" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="no_hp" class="col-sm-4">Nomor Hp</label>
                                             <div class="col-sm-8">
                                                  <input type="number" name="no_hp" id="no_hp" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="tempat_lahir" class="col-sm-4">Tempat Lahir</label>
                                             <div class="col-sm-8">
                                                  <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="tgl_lahir" class="col-sm-4">Tanggl Lahir</label>
                                             <div class="col-sm-8">
                                                  <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= date('Y-m-d') ?>">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="jkel" class="col-sm-4">Jenis Kelamin</label>
                                             <div class="col-sm-8">
                                                  <select name="jkel" id="jkel" class="form-control">
                                                       <option value="">-- Pilih --</option>
                                                       <option value="L">Laki-laki</option>
                                                       <option value="P">Perempuan</option>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col">
                                        <div class="form-group row">
                                             <label for="id_role" class="col-sm-4">Tingkatan</label>
                                             <div class="col-sm-8">
                                                  <select name="id_role" id="id_role" class="form-control">
                                                       <option value="">-- Pilih --</option>
                                                       <option value="1">Bendahara</option>
                                                       <option value="2">Kepala Sekolah</option>
                                                       <option value="3">Pengawas</option>
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
                                                  <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <button type="button" onclick="save()" class="btn btn-success float-right"><i class="fas fa-save"></i> Simpan</button>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</section>

<script>
     function showpassword() {
          var password = $('#password').attr('type');
          if (password == 'password') {
               $('#password').attr('type', 'text');
          } else {
               $('#password').attr('type', 'password');
          }
     }

     function save() {
          var username = $('#username').val();
          var password = $('#password').val();
     }
</script>