<div class="form-container">
    <h3 class="form-judul">Formulir Penulis</h3>
    <form action="<?=BASEURL;?>/penulis/addProcess" method="post">
      <div class="form-group">
        <label for="id_penulis" class="form-label">ID Penulis</label>
        <input type="text" id="id_penulis" name="id_penulis" class="form-input" value="<?=$data['pnls'];?>" readonly>
      </div>

      <div class="form-group">
        <label for="nama_penulis" class="form-label">Nama Penulis</label>
        <input type="text" id="nama_penulis" name="nama_penulis" class="form-input" required>
      </div>

      <div class="form-group">
        <label for="alamat_penulis" class="form-label">Alamat Penulis</label>
        <input type="text" id="alamat_penulis" name="alamat_penulis" class="form-input" required>
      </div>

      <div class="form-group">
        <label for="telp_penulis" class="form-label">No.Telp Penulis</label>
        <input type="text" id="telp_penulis" name="telp_penulis" class="form-input" required>
      </div>
      <div class="form-group">
          <input type="submit" class="form-submit" name="simpan" value="Simpan"></input>
      </div>
    </form>
</div>

