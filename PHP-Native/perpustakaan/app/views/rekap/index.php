<div class="main__container">
    <!-- ADD TABLE HERE -->
    <div class="table-container">
      <div class="button-container">
        <div class="left-button">
          <button onclick="window.location.href='<?=BASEURL;?>/pengembalian/add'" class="add-button">Tambah Data</button>
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
            <th>ID Transaksi</th>
            <th>Member</th>
            <th>Petugas</th>
            <th>Nama Buku</th>
            <th>Jenis Transaksi</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($data['rkp'] as $rkp): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $rkp['id']; ?></td>
            <td><?= $rkp['nama_member']; ?></td>
            <td><?= $rkp['nama_petugas']; ?></td>
            <td><?= $rkp['judul_buku']; ?></td>
            <td><?= $rkp['jenis_transaksi']; ?></td>
            <td><?= $rkp['tanggal']; ?></td>
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
