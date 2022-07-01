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