<div class="form-container">
    <h3 class="form-judul">Formulir Buku</h3>
    <form action="<?=BASEURL;?>/peminjaman/addProcess" method="post">
        <div class="form-group">
            <label for="id_peminjaman" class="form-label">ID Peminjaman</label>
            <input type="text" id="id_peminjaman" name="id_peminjaman" class="form-input" value="<?= $data['pmjmn'];?>" readonly required>
        </div>

        <div class="form-group">
            <label for="id_buku" class="form-label">ID buku</label>
            <select id="multi_option" name="id_buku" placeholder="Pilih id buku....." data-silent-initial-value-set="true" multiple="false">
                <?php 
                foreach($data['buku'] as $buku):
                ?>
                <option value="<?=$buku['id_buku']?>"><?= $buku['id_buku'];?></option>
                <?php 
                endforeach;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_member" class="form-label">ID member</label>
            <select id="multi_option" name="id_member" placeholder="Pilih id member....." data-silent-initial-value-set="true" multiple="false">
                <?php 
                foreach($data['mmbr'] as $mmbr):
                ?>
                <option value="<?=$mmbr['id_member']?>"><?= $mmbr['id_member'];?></option>
                <?php 
                endforeach;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="id_petugas" class="form-label">ID Petugas</label>
            <select id="multi_option" name="id_petugas" placeholder="Pilih id buku..... " multiple="false">
                <?php 
                foreach($data['ptgs'] as $ptgs): 
                ?>
                <option value="<?=$ptgs['id_petugas']?>"><?= $ptgs['id_petugas'];?></option>
                <?php 
                endforeach;
                ?>
            </select>
        </div>

        <div class="form-group">
            <input type="submit" class="form-submit" name="simpan" value="Simpan">
        </div>
    </form>
</div>