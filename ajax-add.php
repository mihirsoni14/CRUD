<?php
echo $fname = $_POST['fname'];
echo $lname = $_POST['lname'];
echo $email = $_POST['email'];
echo $mobile = $_POST['mobile'];
echo $subject = $_POST['subject'];


$conn = new mysqli("localhost", "root", "", "git_project");
$sql = "INSERT INTO students(fname,lname,email,phone,subject_id) VALUES('$fname','$lname','$email','$mobile','$subject')";


$result = $conn->query($sql);
