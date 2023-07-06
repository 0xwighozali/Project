<div class="form-container">
    <h3 class="form-judul">Formulir Member</h3>
    <form action="<?=BASEURL;?>/member/addProcess" method="post">
      <div class="form-group">
        <label for="id_member" class="form-label">ID Member</label>
        <input type="text" id="id_member" name="id_member" class="form-input" value="<?=$data['mmbr'];?>" readonly>
      </div>

      <div class="form-group">
        <label for="nama_member" class="form-label">Nama member</label>
        <input type="text" id="nama_member" name="nama_member" class="form-input" required>
      </div>

      <div class="form-group">
        <label for="alamat_member" class="form-label">Alamat member</label>
        <input type="text" id="alamat_member" name="alamat_member" class="form-input" required>
      </div>

      <div class="form-group">
        <label for="telp_member" class="form-label">No.Telp Member</label>
        <input type="text" id="telp_member" name="telp_member" class="form-input" required>
      </div>
      <div class="form-group">
          <input type="submit" class="form-submit" name="simpan" value="Simpan"></input>
      </div>
    </form>
</div>

