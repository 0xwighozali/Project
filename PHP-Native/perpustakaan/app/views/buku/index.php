<div class="main__container">
    <!-- ADD TABLE HERE -->
    <div class="table-container">
      <div class="button-container">
        <div class="left-button">
          <button onclick="window.location.href='<?=BASEURL;?>/buku/add'" class="add-button">Tambah Data</button>
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
            <th>ID Buku</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Penulis</th>
            <th class="aksi">Aksi</th>
          </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($data['bku'] as $bks => $bk): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $bks; ?></td>
            <td><?= $bk['kode_buku']; ?></td>
            <td><?= $bk['judul_buku']; ?></td>
            <td><?= $bk['penerbit_buku']; ?></td>
            <td><?= $bk['tahun_penerbit']; ?></td>
            <td>
            <?php
                    $nama_penulis_array = $bk['nama_penulis'];
                    echo implode(', ', $nama_penulis_array);
                    ?>
            </td>
            <td></td>
            <td>
              <a href="<?= BASEURL;?>/buku/edit/<?= $bks; ?>" class="edit-button"><i class='bx bxs-edit'></i></a>
              <a href="<?= BASEURL; ?>/buku/hapus/<?=$bks;?>" onclick="return confirm('Yakin Menghapus buku?')" class="delete-button"><i class='bx bx-trash' ></i></a>
            </td>
            
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
