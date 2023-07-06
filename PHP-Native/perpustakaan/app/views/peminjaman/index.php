<div class="main__container">
    <!-- ADD TABLE HERE -->
    <div class="table-container">
      <div class="button-container">
        <div class="left-button">
          <button onclick="window.location.href='<?=BASEURL;?>/peminjaman/add'" class="add-button">Tambah Data</button>
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
          <th>NO</th>
          <th>ID Peminjaman</th>
          <th>Nama Member</th>
          <th>Nama Petugas</th>
          <th>Nama Buku</th>
          <th>Tanggal Peminjaman</th>
          <th>Status</th>
          <th>Aksi</th>
          </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($data['pmjmn'] as $pmjmn): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $pmjmn['id_peminjaman']; ?></td>
            <td><?= $pmjmn['nama_member']; ?></td>
            <td><?= $pmjmn['nama_petugas']; ?></td>
            <td><?= $pmjmn['judul_buku']; ?></td>
            <td><?= $pmjmn['tanggal_peminjaman']; ?></td>
            <td><?= $pmjmn['status_tx']; ?></td>
            <td>
              <a href="<?= BASEURL;?>/peminjaman/edit/<?= $pmjmn['id_peminjaman']; ?>" class="edit-button"><i class='bx bxs-edit'></i></a>
              <a href="<?= BASEURL; ?>/peminjaman/hapus/<?=$pmjmn['id_peminjaman'];?>" onclick="return confirm('Yakin Menghapus buku?')" class="delete-button"><i class='bx bx-trash' ></i></a>
            </td>
            
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
