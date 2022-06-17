<?php

include 'dbcon.php';

$cnt = $_POST['c'];
$cpt = $_POST['cp'];
$tour = $_POST['v'];

$sql = "INSERT INTO `wishlist`(Country, Capital, Visit) VALUES ('{$cnt}', '{$cpt}', '{$tour}')";
$result = mysqli_query($con, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
