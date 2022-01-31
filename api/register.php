<?php

include "../config/koneksi.php";

$Username = @$_POST['Username'];
$Password = md5(@$_POST['Password']);

$data = [];
$query = mysqli_query($kon, "INSERT INTO `admin`(`Username`, `Password`) VALUES ('".$Username."','".$Password."')");

if($query){
    $status = true;
    $pesan = "request success";
    $data[] = [
        "Username" => $Username,
        "Password" => $Password
    ];
}else{
    $status = false;
    $pesan = "requset failed";
}

$json = [
    "status" => $status,
    "pesan" => $pesan,
    "data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>