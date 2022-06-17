<?php

include 'dbcon.php';

$cnt_id = $_POST['edit'];

$sql = "SELECT * FROM `wishlist` WHERE `Id`='{$cnt_id}'";
$result = mysqli_query($con, $sql);
$output = "";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                    <td>Country<b>:</b></td>
                    <td><input type='text' id='ecntry' value='{$row['Country']}'></td>
                </tr>
                <tr>
                    <td>Capital<b>:</b></td>
                    <td><input type='text' id='ecptl' value='{$row['Capital']}'></td>
                </tr>
                <tr>
                    <td>Visit<b>:</b></td>
                    <td><input type='text' id='evst' value='{$row['Visit']}'></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' id='esbmt' value='Save'></td>
                </tr>";
    }

    mysqli_close($con);
    echo $output;
} else {
    echo "<h2>No Record Found!</h2>";
}

// $sql = " UPDATE `wishlist` SET `Country`='[value-2]',`Capital`='[value-3]',`Visit`='[value-4]' ";
// $result = mysqli_query($con, $sql);
