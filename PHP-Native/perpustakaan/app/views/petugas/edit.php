<div class="form-container">
    <h3 class="form-judul">Formulir Petugas</h3>
    <form action="<?=BASEURL;?>/petugas/editProcess/<?=$data['ptgs']['id_petugas'];?>" method="POST">
      <div class="form-group">
        <label for="id_petugas" class="form-label">ID Petugas</label>
        <input type="text" id="id_petugas" name="id_petugas" class="form-input" value="<?=$data['ptgs']['id_petugas'];?>" readonly>
      </div>

      <div class="form-group">
        <label for="nama_petugas" class="form-label">Nama Petugas</label>
        <input type="text" id="nama_petugas" name="nama_petugas" class="form-input" value="<?=$data['ptgs']['nama_petugas'];?>" required>
      </div>

      <div class="form-group">
        <label for="alamat_petugas" class="form-label">Alamat Petugas</label>
        <input type="text" id="alamat_petugas" name="alamat_petugas" class="form-input" value="<?=$data['ptgs']['alamat_petugas'];?>" required>
      </div>

      <div class="form-group">
        <label for="telp_petugas" class="form-label">No.Telp Petugas</label>
        <input type="text" id="telp_petugas" name="telp_petugas" class="form-input" value="<?=$data['ptgs']['telp_petugas'];?>" required>
      </div>
      <div class="form-group">
          <input type="submit" class="form-submit" name="simpan" value="Simpan"></input>
      </div>
    </form>
</div>

