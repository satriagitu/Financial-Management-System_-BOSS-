<form method="POST" id="formberanda">
     <section id="beranda_1" class="mb-4">
          <div class="row">
               <div class="col-6 offset-6">
                    <div class="row">
                         <div class="col">
                              <div class="form-group">
                                   <label for="Tahun_anggaran">Tahun Anggaran</label>
                                   <input type="date" class="form-control" id="thn_anggaran" name="thn_anggaran" value="<?= date('Y-m-d'); ?>">
                              </div>
                         </div>
                         <div class="col">
                              <div class="form-group">
                                   <label for="Jenis_anggaran">Jenis Anggaran</label>
                                   <select name="jns_anggaran" id="jns_anggaran" class="form-control">
                                        <option value="">-- Pilih --</option>
                                   </select>
                              </div>
                         </div>
                         <div class="col my-auto">
                              <button class="btn btn-primary" style="width: 100%; margin-top: 10px;" type="button" id="cari" onclick="carix()">Cari</button>
                              <button class="btn btn-primary" id="beranda" style="width: 100%; margin-top: 10px;" type="button" onclick="berandax()">Beranda</button>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <section id="beranda_2" class="mb-4">
          <div class="row">
               <div class="col">
                    <div class="card">
                         <div class="card-body">
                              <div class="h1"><?= strtoupper($judul); ?></div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
     <section id="beranda_3" class="mb-4">
          <div class="row">
               <div class="col">
                    <div class="card">
                         <div class="card-body text-center">
                              <img src="<?= base_url('assets/img/logo-bos.jpg'); ?>" class="rounded" style="width: 500px;">
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <section id="beranda_4" class="mb-4">
          <div class="row">
               <div class="col">
                    <div class="card">
                         <div class="card-body">
                              <div class="h5">DAFTAR</div>
                              <hr>
                              <div class="table-responsive">
                                   <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                             <tr>
                                                  <th width="1%">No</th>
                                                  <th>asd</th>
                                             </tr>
                                        </thead>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</form>

<script>
     $('#beranda_4').hide();
     $('#beranda').hide();

     function carix() {
          $('#beranda_2').hide('200');
          $('#beranda_3').hide('200');
          $('#beranda_4').show('200');
          $('#cari').hide();
          $('#beranda').show();
     }

     function berandax() {
          $('#beranda_2').show('200');
          $('#beranda_3').show('200');
          $('#beranda_4').hide('200');
          $('#cari').show();
          $('#beranda').hide();
     }
</script>