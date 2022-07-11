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
                         <?php
                         foreach ($data as $value);
                         ?>
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
                                                            $selected = '';
                                                            if ($row->id == $value->standar_pendidikan) $selected = "selected";
                                                            echo "<option value=" . $row->id . " $selected>" . $row->standar_pendidikan . "</option>";
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
                                                            $selected = '';
                                                            if ($row->id == $value->nama_kegiatan) $selected = "selected";
                                                            echo "<option value=" . $row->id . " $selected>" . $row->nama_kegiatan . "</option>";
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
                                                            $selected = "";
                                                            if ($row->id == $value->program) $selected = "selected";
                                                            echo "<option value=" . $row->id . " $selected>" . $row->program . "</option>";
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
                                                            $selected = "";
                                                            if ($row->id == $value->sub_program) $selected = "selected";
                                                            echo "<option value=" . $row->id . " $selected>" . $row->sub_program . "</option>";
                                                       }
                                                       ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="triwulan" class="col-sm-4">Triwulan</label>
                                             <div class="col-sm-8">
                                                  <select name="triwulan" id="triwulan" class="form-control select2_triwulan">
                                                       <option value="">-- Pilih --</option>
                                                       <?php
                                                       foreach ($triwulan as $row) {
                                                            $selected = "";
                                                            if ($row->id == $value->triwulan) $selected = "selected";
                                                            echo "<option value=" . $row->id . " $selected>" . $row->triwulan . "</option>";
                                                       }
                                                       ?>
                                                  </select>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-6">
                                   </div>
                              </div>
                              <hr>
                              <div class="h5 text-primary">URAIAN</div>
                              <br>
                              <div class="row justify-content-center">
                                   <div class="col">
                                        <div class="table-responsive">
                                             <table id="datatable" class="table table-striped table-bordered table-hover">
                                                  <thead>
                                                       <tr class="text-center">
                                                            <th>Delete</th>
                                                            <th width="20%">Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th width="10%">Volume</th>
                                                            <th>Harga</th>
                                                            <th>Jumlah</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php $no = 1;
                                                       foreach ($detail as $q) : ?>
                                                            <tr>
                                                                 <td class="text-center">
                                                                      <button type='button' onclick="hapusBarisIni(<?= $no++; ?>)" class='btn btn-danger btm-sm' id="del<?= $no++; ?>"><i class='fa fa-trash'></i>
                                                                 </td>
                                                                 <td>
                                                                      <input name="namabarang[]" id="namabarang<?= $no++; ?>" type="text" class="form-control" value="<?= $q->namabarang; ?>">
                                                                 </td>
                                                                 <td>
                                                                      <input name="satuan[]" id="satuan<?= $no++; ?>" type="text" class="form-control" value="<?= $q->satuan; ?>">
                                                                 </td>
                                                                 <td>
                                                                      <input name="qty[]" onchange="totalline(<?= $no++; ?>);qtyc(<?= $no++; ?>)" value="<?= number_format($q->qty); ?>" id="qty<?= $no++; ?>" type="text" class="form-control">
                                                                 </td>
                                                                 <td>
                                                                      <input name="harga[]" onchange="totalline(<?= $no++; ?>); cekharga(<?= $no++; ?>);" id="harga<?= $no++; ?>" type="text" class="form-control" value="<?= number_format($q->harga); ?>">
                                                                 </td>
                                                                 <td>
                                                                      <input name="jumlah[]" id="jumlah<?= $no++; ?>" type="text" class="form-control" size="40%" readonly value="<?= number_format($q->jumlah); ?>">
                                                                 </td>
                                                            </tr>
                                                       <?php endforeach; ?>
                                                  </tbody>
                                             </table>
                                        </div>
                                        <div class="row">
                                             <div class="col">
                                                  <button type="button" onclick="tambah()" class="btn btn-success" style="margin-left: 17px;">
                                                       <i class="fa fa-plus"></i>
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-3 offset-9">
                                        <div class="row g-3 align-items-center mb-3">
                                             <div class="col-4">
                                                  <label for="sub_total" class="col-form-label">Sub total</label>
                                             </div>
                                             <div class="col-8">
                                                  <input type="text" id="sub_total" name="sub_total" class="form-control" readonly value="0">
                                             </div>
                                        </div>
                                        <div class="row g-3 align-items-center mb-3">
                                             <div class="col-4">
                                                  <label for="total" class="col-form-label">Total</label>
                                             </div>
                                             <div class="col-8">
                                                  <input type="text" id="total" name="total" class="form-control" readonly value="0">
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
     function separateComma(val) {
          var sign = 1;
          if (val < 0) {
               sign = -1;
               val = -val;
          }
          let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
          let len = num.toString().length;
          let result = '';
          let count = 1;
          for (let i = len - 1; i >= 0; i--) {
               result = num.toString()[i] + result;
               if (count % 3 === 0 && count !== 0 && i !== 0) {
                    result = ',' + result;
               }
               count++;
          }
          if (val.toString().includes('.')) {
               result = result + '.' + val.toString().split('.')[1];
          }
          return sign < 0 ? '-' + result : result;
     }
     var arr = [1];
     var idrow = <?= $jumdata + 1; ?>;
     if (idrow == 2) {
          $('#del1').attr('hidden', true);
     }

     function tambah() {
          var table = document.getElementById('datatable');
          rowCount = table.rows.length;
          arr.push(idrow);
          var x = document.getElementById('datatable').insertRow(rowCount);
          var td1 = x.insertCell(0);
          var td2 = x.insertCell(1);
          var td3 = x.insertCell(2);
          var td4 = x.insertCell(3);
          var td5 = x.insertCell(4);
          var td6 = x.insertCell(5);
          var button = "<td id='kolom" + idrow + "'><button type='button' onclick=hapusBarisIni(" + idrow + ") id=del" + idrow + " class='btn btn-danger'><i class='fa fa-trash'></td>";
          var barang = "<input name='namabarang[]' id='namabarang" + idrow + "' class='form-control'>";
          var satuan = "<input name='satuan[]' id='satuan" + idrow + "' class='form-control'>";
          var qty = "<input name='qty[]' id=qty" + idrow + " onchange='totalline(" + idrow + "); qtyc(" + idrow + ")' value=1  type='text' class='form-control rightJustified'>";
          var harga = "<input name='harga[]'  id=harga" + idrow + " onchange='totalline(" + idrow + ");cekharga(" + idrow + ");' value='0'  type='text' class='form-control rightJustified'> ";
          var jum = "<input name='jumlah[]' id=jumlah" + idrow + " type='text' class='form-control rightJustified' size='40%' readonly value='0'>";
          td1.innerHTML = button;
          td2.innerHTML = barang;
          td3.innerHTML = satuan;
          td4.innerHTML = qty;
          td5.innerHTML = harga;
          td6.innerHTML = jum;
          idrow++;
     }

     function cekharga(id) {
          var harga = $('#harga' + id).val();
          $('#harga' + id).val(separateComma(harga));
     }

     function qtyc(id) {
          var qty = $('#qty' + id).val();
          $('#qty' + id).val(separateComma(qty));
     }

     function totalline(id) {
          var table = document.getElementById('datatable');
          var rowCount = table.rows.length;

          for (var i = 1; i < rowCount; i++) {
               var row = table.rows[i];
               qty = row.cells[3].children[0].value;
               harga = row.cells[4].children[0].value;

               var qty1 = Number(qty.replace(/[^0-9\.]+/g, ""));
               var harga1 = Number(harga.replace(/[^0-9\.]+/g, ""));

               var jumlah = qty1 * harga1;
               row.cells[5].children[0].value = separateComma(jumlah);
               total();
          }
     }

     function total() {
          var table = document.getElementById('datatable');
          var rowCount = table.rows.length;
          tjumlah = 0;
          tppn = 0;
          for (var i = 1; i < rowCount; i++) {
               var row = table.rows[i];
               qty = row.cells[3].children[0].value;
               harga = row.cells[4].children[0].value;
               jumlah = row.cells[5].children[0].value;
               var qty1 = Number(qty.replace(/[^0-9\.]+/g, ""));
               var harga1 = Number(harga.replace(/[^0-9\.]+/g, ""));
               var jumlah1 = Number(jumlah.replace(/[^0-9\.]+/g, ""));
               tjumlah = tjumlah + (qty1 * harga1);
          }
          document.getElementById("sub_total").value = separateComma(tjumlah);
          document.getElementById("total").value = separateComma(tjumlah + tppn);
     }


     function hapusBarisIni(param) {
          var x = document.getElementById('datatable').deleteRow(arr.indexOf(param) + 1);
          arr.splice(arr.indexOf(param), 1);
          rowCount--;
          total();
     }

     $(".select2_standar").select2();
     $(".select2_nama_kegiatan").select2();
     $(".select2_program").select2();
     $(".select2_sub_program").select2();
     $(".select2_triwulan").select2();

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
                    url: "<?php echo base_url(); ?>Perencanaan/save_edit/" + "<?php echo $id; ?>",
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
                                   text: 'Save Data Gagal',
                              });
                         }
                    }
               });
          }
     }
</script>