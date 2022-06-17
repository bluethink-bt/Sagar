<?php

include 'config.php';

$sql = " SELECT * FROM `tasks` ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

        <li>
            <span class="text"><input type="checkbox" class="chkr" value="<?php echo $row['id']; ?>"> <?php echo $row['title']; ?> </span>
            <i id="removeBtn" class="icon fa fa-trash" data-id=" <?php echo $row['id']; ?>"></i>
        </li>

<?php }

    // echo '<div class="pending-text">You have ' . mysqli_num_rows($result) . ' pending tasks!</div>';
} else {
    echo "<li><span class='text'>No Record Found.</span></li>";
}

?>

<center><button type="submit" id="dltck">Delete</button></center>