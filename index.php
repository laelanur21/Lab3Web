<?php
include("koneksi.php");

//query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
</head>

<body>
    <div class="container">
        <h1>
            <center>Data Barang</center>
        </h1>
        <center><a class="tambah" href="tambah.php">Tambah Barang</a></center>
        <div class="main">
            <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result) : ?>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" style="width: 90px; height: 90px;"></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['kategori']; ?></td>
                            <td>Rp<?php echo number_format($row['harga_beli']) ?></td>
                            <td>Rp<?php echo number_format($row['harga_jual']) ?></td>
                            <td><?= $row['stok']; ?></td>
                            <!-- id_barang dihapus agar link ubah dan hapus bisa masuk ke tabel aksi -->
                            <td>
                                <!-- Pemberian 2 aksi pada tabel yaitu Ubah dan Hapus -->
                                <a href="ubah.php?id=<?= $row['id_barang']; ?>">ubah</a>
                                <a href="hapus.php?id=<?= $row['id_barang']; ?>">hapus</a>
                            </td>
                        </tr>
                    <?php endwhile;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>

</html>