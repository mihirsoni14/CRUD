<?php
$id = $_POST['id'];
$conn = new mysqli("localhost", "root", "", "git_project");
$sql = "SELECT * FROM students where id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<table id="load-data">
</table>

<form id="form-att">
    <div id="form_edit">
        <i class="fa-solid fa-x" id="close-btn"></i>
        <div class="form_box">
            <div class="errors">
                <div id="alert-btn" class="alert alert-danger"></div>
                <div id="alert-btn-email" class="alert alert-danger"></div>
            </div>
            <h2 class="mx-1">Update Student</h2>
            <div class="name">
                <input type="hidden" value="<?php echo $row['id'] ?>" name="id" id="id">
                <span> Name :</span>
                <input type="text" value="<?php echo $row['fname'] ?>" id="fname_updated">
            </div>
            <div class="lname">
                <span> Last Name :</span>
                <input type="text" value="<?php echo $row['lname'] ?>" id="lname_updated">
            </div>
            <div class="email">
                <span> Email :</span>
                <input type="text" value="<?php echo $row['email'] ?>" id="email_updated">
            </div>
            <div class="mobile">
                <span> Mobile Number :</span>
                <input type="text" value="<?php echo $row['phone'] ?>" id="mobile_updated">
            </div>
            <div class="subject">
                <span> Subject :</span>
                <select id="subject_updated">

                    <?php
                    $sql2 = "SELECT * FROM subject_tbl";
                    $result2 = $conn->query($sql2);
                    $selected = "Selected";
                    while ($row2 = $result2->fetch_assoc()) {
                        if ($row['subject_id'] == $row2['id']) {
                            echo "<option value='$row2[id]' $selected >$row2[subject]</option>";
                        } else {
                            echo "<option value='$row2[id]'>$row2[subject]</option>";
                        }
                    }
                    ?>

                </select>
            </div>
            <button id="data_update">Submit</button>

        </div>
    </div>
</form>