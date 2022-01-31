<?php

include "../config/koneksi.php";

$id = @$_POST['id'];
$Nama_barang = @$_POST['Nama_barang'];
$Jumlah_barang = @$_POST['Jumlah_barang'];

$data = [];

$query = mysqli_query($kon, "UPDATE `barang`
SET `Nama_barang` ='". $Nama_barang ."',
`Jumlah_barang`  = '". $Jumlah_barang ."'
WHERE `id` ='". $id ."'");

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