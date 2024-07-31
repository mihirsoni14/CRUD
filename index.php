<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>CRUD</title>
</head>

<body>
    <nav>
        <div class="logo">Student's Details</div>
        <div class="actions">
            <a id="add-btn">Add Student</a>
        </div>

    </nav>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "git_project");
    $sql = "Select * from subject_tbl";
    $result = mysqli_query($conn, $sql);
    ?>



    <main id="main_section">
        <table id="load-data">
        </table>
    </main>

    <script>
        $(document).ready(function () {
            function refreshData() {
                $.ajax({
                    url: "ajax-load.php",
                    method: "POST",
                    success: function (data) {
                        $("#load-data").html(data)
                    }
                })
            }

            $("#add-btn").on("click", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "add-from.php",
                    type: "post",
                    success: function (data) {
                        refreshData()
                        $("#main_section").html(data)
                        $("#alert-btn").hide()
                        $("#alert-btn-email").hide()

                    }
                })

                $("#form").css("visibility", "visible")
                $("#form").css("opacity", "1")
            })

            $(document).on("click", "#close-btn", function (e) {
                let form = $("#form");
                let form_edit = $("#form_edit");

                if (form_edit) {
                    refreshData()
                    $("#form_edit").css("visibility", "hidden")
                    $("#form_edit").css("opacity", "0")
                };
                if (form) {
                    refreshData()
                    $("#form").css("visibility", "hidden")
                    $("#form").css("opacity", "0")
                }

            })

            $(document).on("click", "#data_send", function (e) {
                let fname = $("#fname").val()
                let lname = $("#lname").val()
                let email = $("#email").val()
                let mobile = $("#mobile").val()
                let subject = $("#subject").val()
                e.preventDefault()

                if ((fname != "" && lname != "" && email != "" && mobile != "")) {
                    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!emailPattern.test(email)) {
                        $("#alert-btn-email").text("Email not valid")
                        $("#alert-btn-email").show()
                    }

                    if (emailPattern.test(email)) {
                        $("#alert-btn-email").hide("fast")
                    }

                    if (mobile.length != 10) {
                        $("#alert-btn").text("Mobile number required only 10 Digit ")
                        $("#alert-btn").show("fast")
                    }
                    if (mobile.length == 10) {
                        $.ajax({
                            url: "ajax-add.php",
                            type: "post",
                            data: { fname: fname, lname: lname, email: email, mobile: mobile, subject: subject },
                            success: function (data) {
                                $("#form").css("visibility", "hidden")
                                $("#form").css("opacity", "0")
                                refreshData()
                            }
                        })
                    }
                } else {
                    $("#alert-btn").text("All field is required")
                    $("#alert-btn").show("fast")
                }


            })

            $(document).on("click", "#student-update", function () {
                let id = $(this).data("id")
                console.log(id);
                $.ajax({
                    url: "update-form.php",
                    type: "post",
                    data: { id: id },
                    success: function (data) {
                        $("#main_section").html(data)
                        $("#alert-btn").hide()
                        $("#alert-btn-email").hide()
                        refreshData()
                    }
                })
            })


            $(document).on("click", "#data_update", function (e) {
                e.preventDefault()
                let id = $("#id").val()
                let fname = $("#fname_updated").val()
                let lname = $("#lname_updated").val()
                let email = $("#email_updated").val()
                let mobile = $("#mobile_updated").val()
                let subject = $("#subject_updated").val()


                if ((fname != "" && lname != "" && email != "" && mobile != "")) {
                    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (!emailPattern.test(email)) {
                        $("#alert-btn-email").text("Email not valid")
                        $("#alert-btn-email").show("fast")
                    }
                    if (emailPattern.test(email)) {
                        $("#alert-btn-email").hide("fast")
                    }

                    if (mobile.length != 10) {
                        $("#alert-btn").text("Mobile number required only 10 Digit ")
                        $("#alert-btn").show("fast")
                    }
                    if (mobile.length == 10) {
                        $.ajax({
                            url: "ajax-update.php",
                            type: "post",
                            data: { id: id, fname: fname, lname: lname, email: email, mobile: mobile, subject: subject },
                            success: function () {
                                $("#form_edit").css("visibility", "hidden")
                                $("#form_edit").css("opacity", "0")
                                refreshData()
                            }
                        })
                    }
                } else {
                    $("#alert-btn").text("All field is required")
                    $("#alert-btn").show("fast")
                }













            })

            $(document).on('click', '#student-delete', function (e) {
                e.preventDefault();
                let deleteId = $(this).data('id')

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this student data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });

                            $.ajax({
                                url: "ajax-delete.php",
                                type: "POST",
                                data: { id: deleteId },
                                success: function (data) {
                                    refreshData()
                                }
                            })

                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            })
            refreshData()
        })
    </script>
</body>

</html>