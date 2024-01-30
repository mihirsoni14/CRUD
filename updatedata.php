<?php

$stu_id = $_POST['sid'];
$name = $_POST['name'];
$mobile = $_POST['mobile'];
$stream = $_POST['course'];

$conn = mysqli_connect("localhost", "root", "", "crud");
$sql = "update student set sname = '$name' , smobile = '$mobile', Subject = '$stream' where sid = '$stu_id'";
$result = mysqli_query($conn, $sql);

header("Location:index.php")

?>