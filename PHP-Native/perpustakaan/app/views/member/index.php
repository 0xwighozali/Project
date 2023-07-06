
  <div class="main__container">
    <!-- ADD TABLE HERE -->
    <div class="table-container">
      <div class="button-container">
        <div class="left-button">
          <button onclick="window.location.href='<?=BASEURL;?>/member/add'" class="add-button">Tambah Data</button>
        </div>

        <form method="POST" action="">
          <div class="right-container">
            <input type="text" class="search-input" placeholder="Cari member...." name="filter">
            <button type="submit" name="search" class="search-button">Cari</button>
          </div>
        </form>
      </div>
      <table class="table">

        <!-- header tabel/judul kolom -->
        <thead>
          <tr>
            <th>No</th>
            <th>ID Member</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($data['mmbr'] as $mmbr): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $mmbr['id_member']; ?></td>
            <td><?= $mmbr['nama_member']; ?></td>
            <td><?= $mmbr['alamat_member']; ?></td>
            <td><?= $mmbr['telp_member']; ?></td>
            <td>
              <a href="<?= BASEURL;?>/member/edit/<?= $mmbr['id_member']; ?>" class="edit-button"><i class='bx bxs-edit'></i></a>
              <a href="<?= BASEURL; ?>/member/hapus/<?=$mmbr['id_member'];?>" onclick="return confirm('Yakin Menghapus buku?')" class="delete-button"><i class='bx bx-trash' ></i></a>
            </td>
            
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
