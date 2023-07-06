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
          <th>NO</th>
          <th>ID pengembalian</th>
          <th>ID peminjaman</th>
          <th>Nama Member</th>
          <th>Nama Petugas</th>
          <th>Nama Buku</th>
          <th>Tanggal pengembalian</th>
          <th>Aksi</th>
          </tr>
        </thead>
        <?php 
        $no = 1;
        foreach($data['pngmbln'] as $pngmbln): 
        ?>
        <tbody>
            <td><?= $no++; ?></td>
            <td><?= $pngmbln['id_pengembalian']; ?></td>
            <td><?= $pngmbln['id_peminjamanFK']; ?></td>
            <td><?= $pngmbln['nama_member']; ?></td>
            <td><?= $pngmbln['nama_petugas']; ?></td>
            <td><?= $pngmbln['judul_buku']; ?></td>
            <td><?= $pngmbln['tanggal_pengembalian']; ?></td>
            <td>
              <a href="<?= BASEURL;?>/pengembalian/edit/<?= $pngmbln['id_pengembalian']; ?>" class="edit-button"><i class='bx bxs-edit'></i></a>
              <a href="<?= BASEURL; ?>/pengembalian/hapus/<?=$pngmbln['id_pengembalian'];?>" onclick="return confirm('Yakin Menghapus buku?')" class="delete-button"><i class='bx bx-trash' ></i></a>
            </td>
            
            
          <!-- Add more rows here -->
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
