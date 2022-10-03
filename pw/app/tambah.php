<?php
require '../function.php';

// cek apakah tombol telah ditekan
if (isset($_POST['submit'])) {
  if (tambah($_POST) > 0) {
    echo "<script> 
   alert('Data Berhasil Ditambahkan');
   document.location.href = '../index.php';
   </script>";
  } else {
    echo " <script>
    alert('Gagal Ditambahkan');
    </script> ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>

  <!-- link css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/tambah.css">

</head>

<body>

  <div class="container">
    <div class="alert alert-dark" role="alert">
      <h3>Tambahkan Data</h3>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-2">
          <p>Gambar</p>
          <p>Judul Buku</p>
          <p>Kategori Buku</p>
          <p>Penulis Buku</p>
          <p>Harga</p>
        </div>
        <div class="col-4">
          <input type="file" name="Gambar" class="Gambar" onchange="previewImage()">
          <input type="text" name="JudulBuku" required autocomplete="off">
          <input type="text" name="KategoriBuku" autocomplete="off">
          <input type="text" name="PenulisBuku" autocomplete="off">
          <input type="text" name="Harga" autocomplete="off">
          <br>
          <button type="submit" class="btn btn-success mt-2" name="submit">Simpan</button>
          <a href="../index.php" class="btn btn-outline-secondary mt-2">kembali</a>
        </div>
        <div class="col-6">
          <img src="../assets/img/nophoto.jpg" style="display: block;" class="img-preview" width="200px">
        </div>

    </form>
  </div>

  <script src="../js/script.js">
  </script>

</body>

</html>