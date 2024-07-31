<?php
$conn = new mysqli("localhost", "root", "", "git_project");
$sql = "SELECT * from subject_tbl";
$result = $conn->query($sql)
    ?>

<table id="load-data">
</table>

<form id="form-att">
    <div id="form">
        <i class="fa-solid fa-x" id="close-btn"></i>
        <div class="form_box">
            <div class="errors">
                <div id="alert-btn" class="alert alert-danger"></div>
                <div id="alert-btn-email" class="alert alert-danger"></div>
            </div>
            <h2 class="mx-1">Add Student</h2>
            <div class="name">
                <span> Name :</span>
                <input type="text" id="fname">
            </div>
            <div class="lname">
                <span> Last Name :</span>
                <input type="text" id="lname">
            </div>
            <div class="email">
                <span> Email :</span>
                <input type="text" id="email">
            </div>
            <div class="mobile">
                <span> Mobile Number :</span>
                <input type="text" id="mobile">
            </div>
            <div class="subject">
                <span> Subject :</span>
                <select id="subject">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo " <option value='$row[id]'>$row[subject]</option>";
                    }
                    ?>
                </select>
            </div>
            <button id="data_send">Submit</button>

        </div>
    </div>
</form>