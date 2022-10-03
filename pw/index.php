<?php
include './config/koneksi-db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum Web 2022</title>

  <!-- link css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="css/index.css">

</head>

<body>
  <div class="alert alert-secondary text-center" role="alert">
    <h1>Buku Terpopuler 2022</h1>
    <p>Rahman Ramadan - 203040132</p>
  </div>

  <div class="container">
    <div class="tambah">
      <a href="app/tambah.php" class="btn btn-success">Tambahkan Buku</a>
    </div>
    <div class="col-10 mx-auto">
      <?php
      $i = 1;

      while ($data = mysqli_fetch_array($query)) {
      ?>

        <div class="card">
          <img src="assets/img/<?= $data['gambar_buku']; ?>" alt="" height="200px">
          <div class="card-body">
            <h6 class="card-title"><?= $data['judul_buku']; ?></h6>
            <!-- <p class="card-text"><?= $data['penulis_buku']; ?></p> -->
            <div class="alert alert-success" role="alert">
              Rp. <?= $data['harga']; ?>
            </div>
            <div class="d-grid">
              <a href="CRUD/detail.php?id=<?= $data['id_buku']; ?>" class="btn btn-primary">Detail</a>
              <a href="app/hapus.php?id_buku=<?= $data['id_buku']; ?>" class="btn btn-light mt-2">Hapus</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

  </div>


  </table>

</body>

</html>