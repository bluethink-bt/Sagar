<?php

include 'dbcon.php';

$sql = " SELECT * from `wishlist` ";
$result = mysqli_query($con, $sql);

$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
    <tr>
        <th>Id</th>
        <th>Country</th>
        <th>Capital</th>
        <th>Visit</th>
        <th>Action</th>
    </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                <td>{$row['Id']}</td>
                <td>{$row['Country']}</td>
                <td>{$row['Capital']}</td>
                <td>{$row['Visit']}</td>
                <td><center><button type='submit' class='edt' data-eid='{$row['Id']}'>Edit</button>
                <button type='submit' class='dlt' data-did='{$row['Id']}'>Remove</button></center></td>
             </tr>";
    }
    $output .= "</table>";
    echo $output;
} else {
    echo "No record found!";
}
