<?php


require '../function.php';

// Jika tidak ada id di url
if (!isset($_GET['id_buku'])) {
  header("Location: ../index.php");
  exit;
}

// mengambil id dari user
$id = $_GET['id_buku'];

if (hapus($id) > 0) {
  echo "<script> 
   alert('Data Berhasil Dihapus');
   document.location.href = '../index.php';
   </script>";
} else {
  echo " <script>
    alert('Gagal Ditambahkan');
    </script> ";
}
