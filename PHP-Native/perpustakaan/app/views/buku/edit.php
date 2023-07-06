<div class="form-container">
    <h3 class="form-judul">Formulir Buku</h3>
    <form action="<?=BASEURL;?>/buku/editProcess/<?=$data['bku']['id_buku'];?>" method="post">
      <div class="form-group">
        <label for="id_buku" class="form-label">ID Buku</label>
        <input type="text" id="id_buku" name="id_buku" class="form-input" value="<?=$data['bku']['id_buku'];?>" readonly>
      </div>

      <div class="form-group">
        <label for="kode_buku" class="form-label">Kode Buku</label>
        <input type="text" id="kode_buku" name="kode_buku" class="form-input" value="<?=$data['bku']['kode_buku'];?>" required>
      </div>

      <div class="form-group">
        <label for="judul_buku" class="form-label">Judul Buku</label>
        <input type="text" id="judul_buku" name="judul_buku" class="form-input" value="<?=$data['bku']['judul_buku'];?>" required>
      </div>

      <div class="form-group">
        <label for="penerbit_buku" class="form-label">Penerbit Buku</label>
        <input type="text" id="penerbit_buku" name="penerbit_buku" class="form-input" value="<?=$data['bku']['penerbit_buku'];?>" required>
      </div>
      
      <div class="form-group">
        <label for="tahun_penerbit" class="form-label">Tahun Terbit</label>
        <input type="text" id="tahun_penerbit" name="tahun_penerbit" class="form-input" value="<?=$data['bku']['tahun_penerbit'];?>" required>
      </div>

      <div class="form-group">
        <label for="penulis" class="form-label">Tahun Terbit</label>
        <select id="multi_option" multiple name="id_penulis" placeholder="Pilih Penulis..." data-silent-initial-value-set="false">
        <?php 
        foreach($data['pnls'] as $pnls):
        ?>
        <option value="<?=$pnls['id_penulis']?>"><?= $pnls['id_penulis']; ?> | <?= $pnls['nama_penulis']; ?></option>
        <?php 
        endforeach;
        ?>
        </select>
      </div>
      <div class="form-group">
          <input type="submit" class="form-submit" name="simpan" value="Simpan"></input>
      </div>
    </form>
</div>

