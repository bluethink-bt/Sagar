<?php

include 'config.php';

$dlt = $_POST['ids'];
foreach ($dlt as $did) {
    $sql = " DELETE FROM `tasks` WHERE id='" . $did . "' ";
    $result = mysqli_query($con, $sql);
}
if ($result) {
    echo 1;
} else {
    echo 0;
}
