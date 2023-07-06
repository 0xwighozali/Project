
<div class="main__container">
    <!-- ADD TABLE HERE -->
    <div class="table-container">
      <div class="button-container">
        <div class="left-button">
          <button onclick="window.location.href='<?=BASEURL;?>/penulis/add'" class="add-button">Tambah Data</button>
        </div>

        <form method="POST" action="">
          <div class="right-container">
            <input type="text" class="search-input" placeholder="Cari penulis...." name="filter">
            <button type="submit" name="search" class="search-button">Cari</button>
          </div>
        </form>
      </div>
      <table class="table">

        <!-- header tabel/judul kolom -->
        <thead>
          <tr>
            <th>No</th>
            <th>ID penulis</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($data['pnls'] as $pnls): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $pnls['id_penulis']; ?></td>
            <td><?= $pnls['nama_penulis']; ?></td>
            <td><?= $pnls['alamat_penulis']; ?></td>
            <td><?= $pnls['telp_penulis']; ?></td>
            <td>
              <a href="<?= BASEURL;?>/penulis/edit/<?= $pnls['id_penulis']; ?>" class="edit-button"><i class='bx bxs-edit'></i></a>
              <a href="<?= BASEURL; ?>/penulis/hapus/<?=$pnls['id_penulis'];?>" onclick="return confirm('Yakin Menghapus buku?')" class="delete-button"><i class='bx bx-trash' ></i></a>
            </td>
            
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
