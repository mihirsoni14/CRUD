<?php $conn = new mysqli("localhost", "root", "", "git_project");
$querry = "SELECT stu.id ,stu.fname,stu.lname,stu.phone,stu.subject_id ,sub.subject from students stu join subject_tbl sub on stu.subject_id = sub.id ";
$result = $conn->query($querry); ?>


<thead>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Mobile.No</th>
        <th>Subject</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php

    while ($row = mysqli_fetch_assoc($result)) {
        if (mysqli_num_rows($result) > 0) {
            ?>
            <tr>
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row["fname"] . " " . $row['lname']; ?>
                </td>
                <td>
                    <?php echo $row["phone"] ?>
                </td>
                <td>
                    <?php echo $row["subject"] ?>
                </td>
                <td>
                    <div class="action">
                        <a id="student-update" data-id="<?= $row['id'] ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                        <a id="student-delete" data-id="<?= $row['id'] ?>"> <i class='bx bx-trash'></i></a>
                    </div>
                </td>
            </tr>
            <?php
        }
    } ?>
</tbody>