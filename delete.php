<?php
$conn = mysqli_connect("localhost","root","","rms");
if (!$conn) {
    echo"unsucessfull :(";
}
$del_id = $_GET['id'];
$sql = "delete from results where roll='$del_id'";
$del_query = mysqli_query($conn,$sql);
if ($del_query) {
    header('location:index.php');
}
?>
