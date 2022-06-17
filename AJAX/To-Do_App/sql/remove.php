<?php

include 'config.php';

$rmv = $_POST['id'];

$sql = " DELETE FROM `tasks` WHERE id='{$rmv}' ";
$result = mysqli_query($con, $sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}
