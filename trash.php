<?php
echo $stu_id = $_GET['id'];
$conn = mysqli_connect("localhost","root","", "crud");
$querry = "delete from student where sid = $stu_id";
$result = mysqli_query($conn,$querry);

header("location: index.php");
?>