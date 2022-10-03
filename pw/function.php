<?php


function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040132_pw');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  // ubah data ke dalam array
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function upload()
{
  $nama_file = $_FILES['Gambar']['name'];
  $tipe_file = $_FILES['Gambar']['type'];
  $ukuran_file = $_FILES['Gambar']['size'];
  $error = $_FILES['Gambar']['error'];
  $tmp_file = $_FILES['Gambar']['tmp_name'];

  // ketika tidak memilih gambar
  if ($error == 4) {
    //   echo "<script>
    //   alert('pilih gambar terlebih dahulu');
    // </script>";

    return 'nophoto.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
    alert('Yang Anda Pilih Bukan Gambar');
  </script>";

    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png' && $tipe_file != 'image/jpg') {
    echo "<script>
    alert('Yang Anda Pilih Bukan Gambar');
  </script>";

    return false;

    // cek ukuran file
    // maksimal 5Mb = 5000000
    if ($ukuran_file > 5000000) {
      echo "<script>
    alert('Ukuran Terlalu Besar');
  </script>";
      return false;
    }
  }

  // lolos pengecekan 
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();

  // $Gambar = htmlspecialchars($data['Gambar']);
  $judulBuku = htmlspecialchars($data['JudulBuku']);
  $kategoriBuku = htmlspecialchars($data['KategoriBuku']);
  $penulisBuku = htmlspecialchars($data['PenulisBuku']);
  $harga = htmlspecialchars($data['Harga']);

  // upload gambar
  $Picture = upload();
  if (!$Picture) {
    return false;
  }

  $query = "INSERT INTO buku
              VALUES 
              ('null','$judulBuku','$kategoriBuku','$penulisBuku', '$harga', '$Picture'); ";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar di folder img
  $lem = query("SELECT * FROM buku WHERE id_buku=$id");
  if ($lem['gambar_buku'] != 'nophoto.jpg') {
    unlink('../assets/img/' . $lem['gambar_buku']);
  }

  mysqli_query($conn, "DELETE FROM buku WHERE id_buku =$id") or die(mysqli_error($conn));

  return mysqli_affected_rows($conn);
}
