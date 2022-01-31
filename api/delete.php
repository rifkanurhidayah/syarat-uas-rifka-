<?php

include "../config/koneksi.php";

$Id = @$_POST['id'];

//var_dump($Id); exit;

$data = [];

$query = mysqli_query($kon, "DELETE FROM `barang`
 WHERE `id`='". $Id ."'");

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