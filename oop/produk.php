<?php

// property : data


class Produk
{
  public $judul = "judul",
    $penulis = "penulis",
    $penerbit = "penerbit",
    $harga = 0;

  // method : perilaku
  public function getLabel()
  {
    return "$this->penulis, $this->penerbit, $this->harga ";
  }
}

// $produk1 = new Produk();
// $produk1->judul = "Naruto";
// var_dump($produk1);

// $produk2  = new Produk;
// $produk2->judul = "Uncharted";
// var_dump($produk2->judul);


$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masahi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 50000;

$produk4 = new Produk();
$produk4->judul = "Uncharted";
$produk4->penulis = "Neil Druckmann";
$produk4->penerbit = "Sony Computer";
$produk4->harga = 1000;

echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
