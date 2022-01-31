<?php

include "../config/koneksi.php";

$Username = @$_POST['Username'];
$Password = md5(@$_POST['Password']);

$data = [];

$query = mysqli_query($kon, "SELECT * FROM `admin`
WHERE `Username` = '". $Username ."'
&&
`Password` = '". $Password ."'");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = mysqli_fetch_assoc($query);
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