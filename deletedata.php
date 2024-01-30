<?php 

$stu_id = $_POST['sid'];
$conn = mysqli_connect("localhost", "root", "", "crud");
$sql = "delete from student where sid = '$stu_id'";
$result = mysqli_query($conn, $sql);

// header("Location:index.php")
?>