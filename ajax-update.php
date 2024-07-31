<?php

echo $id = $_POST['id'];
echo $fname = $_POST['fname'];
echo $lname = $_POST['lname'];
echo $email = $_POST['email'];
echo $mobile = $_POST['mobile'];
echo $subject = $_POST['subject'];

$conn = new mysqli("localhost", "root", "", "git_project");
$sql = "UPDATE students set fname= '$fname',lname='$lname',email= '$email', phone= '$mobile' , subject_id='$subject' where id = $id";
$result = $conn->query($sql)


    ?>