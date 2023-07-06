<div class="form-container">
    <h3 class="form-judul">Formulir Buku</h3>
    <form action="<?=BASEURL;?>/pengembalian/editProcess/<?=$data['pngmbln']['id_pengembalian'];?>" method="post">
        <div class="form-group">
            <label for="id_peminjaman" class="form-label">ID Pengembalian</label>
            <input type="text" id="id_pengembalian" name="id_pengembalian" class="form-input" value="<?= $data['pngmbln']['id_pengembalian'];?>" readonly required>
        </div>

        <div class="form-group">
            <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
            <select id="multi_option" name="id_peminjaman" placeholder="Pilih id peminjaman....." data-silent-initial-value-set="true" multiple="false">
                <?php 
                foreach($data['pmjmn'] as $pmjmn):
                ?>
                <option value="<?=$pmjmn['id_peminjaman']?>"><?= $pmjmn['id_peminjaman'];?></option>
                <?php 
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="id_buku" class="form-label">ID Buku</label>
            <input type="text" id="id_buku" name="id_buku" class="form-input" readonly required>
        </div>
        <div class="form-group">
            <label for="id_member" class="form-label">ID Member</label>
            <input type="text" id="id_member" name="id_member" class="form-input" readonly required>
        </div>
        <div class="form-group">
            <label for="id_petugas" class="form-label">ID Petugas</label>
            <input type="text" id="id_petugas" name="id_petugas" class="form-input" required>
        </div>

        <div class="form-group">
            <input type="submit" class="form-submit" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
  $('#multi_option').change(function () {
    var selectedId = $(this).val();

    $.ajax({
      url: 'http://localhost/perpustakaan/public/pengembalian/getdata',
      method: 'POST',
      data: { id_peminjaman: selectedId },
      dataType : 'json',
      success: function (data) {
        $('#id_buku').val(data.id_bukuFK);
        $('#id_member').val(data.id_memberFK);
        $('#id_petugas').val(data.id_petugasFK);
        console.log(data)
      },
      error: function () {
        alert('Terjadi kesalahan. Silakan coba lagi.');
      },
    });
  });
});
</script>