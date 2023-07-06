<div class="main__container">
    <!-- ADD TABLE HERE -->
    <div class="table-container">
      <div class="button-container">
        <div class="left-button">
          <button onclick="window.location.href='<?=BASEURL;?>/petugas/add'" class="add-button">Tambah Data</button>
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
        foreach($data['ptgs'] as $ptgs): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $ptgs['id_petugas']; ?></td>
            <td><?= $ptgs['nama_petugas']; ?></td>
            <td><?= $ptgs['alamat_petugas']; ?></td>
            <td><?= $ptgs['telp_petugas']; ?></td>
            <td>
              <a href="<?= BASEURL;?>/petugas/edit/<?= $ptgs['id_petugas']; ?>" class="edit-button"><i class='bx bxs-edit'></i></a>
              <a href="<?= BASEURL; ?>/petugas/hapus/<?=$ptgs['id_petugas'];?>" onclick="return confirm('Yakin Menghapus buku?')" class="delete-button"><i class='bx bx-trash' ></i></a>
            </td>
            
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
