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

        <table>

            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Mobile.No</th>
                    <th>Roll</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "crud") or die("Could not connect to");
            $querry = "Select * from student join studentclass where student.Subject = studentclass.cid";
            $result = mysqli_query($conn, $querry);
            while ($row = mysqli_fetch_assoc($result)) {
                if (mysqli_num_rows($result) > 0) {
                    ?>
                   
                        <tr>
                            <td>
                                <?php echo "$row[sid]"; ?>
                            </td>
                            <td>
                                <?php echo $row["sname"]; ?>
                            </td>
                            <td>
                                <?php echo $row["smobile"] ?>
                            </td>
                            <td>
                                <?php echo $row["cname"] ?>
                            </td>
                            <td>
                                <div class="action">
                                   <a href="edit.php?id=<?php echo "$row[sid]"; ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                   <a href="trash.php?id=<?php echo "$row[sid]"; ?>"> <i class='bx bx-trash'></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php
                }else {
                    echo "No records found";
                }
            }
            ?>
                    </tbody>
                  
        </table>
    </main>
</body>

</html>