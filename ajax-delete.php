<?php

$id = $_POST['id'];

$conn = new mysqli("localhost", "root", "", "git_project");
$sql = "DELETE from students where id =  $id";
$result = $conn->query($sql);
