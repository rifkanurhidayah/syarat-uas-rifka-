<?php

include "../config/koneksi.php";

$Nama_barang = @$_POST['Nama_barang'];
$Jumlah_barang = @$_POST ['Jumlah_barang'];

$data = [];

$query = mysqli_query($kon, "INSERT INTO `barang`
( `Nama_barang` , 
  `Jumlah_barang` )
  VALUES
  ('". $Nama_barang ."',
  '". $Jumlah_barang ."')");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = $query;
}else{
    $status = false;
    $pesan = "request failed";
}

$json = [
  "status" => $status,
  "pesan" => $pesan,
  "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>