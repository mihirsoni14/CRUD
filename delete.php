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
    <div class="add">
            <h2>Add Data: </h2>
            <form action="deletedata.php" method="post">
                <div class="name" > <span>Id</span><input type="text" name="sid"></div>
                <button type="submit" class="btn-delete" >delete</button>
            </form>
        </div>
    </main>
</body>

</html>