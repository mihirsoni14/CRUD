<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CRUD</title>
</head>

<body>
    <nav>
        <div class="logo">Student's Details</div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="add.php">ADD</a></li>
            <li><a href="update.php">Update</a></li>
            <li><a href="delete.php">Delete</a></li>
        </ul>
    </nav>


    <main>
        <div class="add update">
            <h2>Edit Data: </h2>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="name"> <span>Id</span> <input type="text" name="sid"></div>
                <button type="submit" name="showbtn" class="blue">Show</button>
            </form>

            <?php
            if (isset($_POST['showbtn'])) {
                $stu_id = $_POST['sid'];
                $conn = mysqli_connect("localhost", "root", "", "crud") or die("Could not connect to");
                $querry = "SELECT * FROM student WHERE sid = {$stu_id}";
                $result = mysqli_query($conn, $querry);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                        <form action="updatedata.php" method="post" class="secondform">
                            <div class="name">
                                <span>Name </span> 
                                <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>" >
                                <input type="text" name="name" value="<?php echo $row['sname'] ?>">
                            </div>
                            <div class="mobile">
                                <span>Mobile No </span>
                                <input type="text" name="mobile" value="<?php echo $row['smobile'] ?>">
                            </div>
                            <div class="stream"><span>Stream</span>

                                <select name="course">

                                    <?php
                                   
                                    $sql2 = "SELECT * FROM studentclass";
                                    $result2 = mysqli_query($conn, $sql2);


                                    while ($row1 = mysqli_fetch_assoc($result2)) {
                                        if($row["Subject"] == $row1["cid"]){
                                            $selected = "selected";
                                        }else{
                                            $selected = "";
                                        }
                                     echo "<option $selected value='$row1[cid]'>$row1[cname]</option>";
                                        
                                    }

                                ?>
                                </select>

                            </div>
                            <button type="submit">Submit</button>
                        </form>

                        <?php
                    }
                }
            }
            ?>
        </div>
    </main>
</body>

</html>