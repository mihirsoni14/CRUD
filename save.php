<?php

$name = $_POST["name"];
$mobile = $_POST["mobile"];
$course = $_POST["course"];

$conn = mysqli_connect("localhost", "root", "", "crud") or die("Could not connect to");
$querry = "	INSERT INTO student(sname, smobile,Subject) VALUES ('$name','$mobile','$course')";
$result = mysqli_query($conn, $querry);

header("location: index.php");

?>