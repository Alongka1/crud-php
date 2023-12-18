<?php

include_once('functions.php');

$insertdata = new DB_con();

if (isset($_POST['insert'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];

    $sql = $insertdata->insert($fname, $lname, $email, $phonenumber, $address);

    if ($sql) {
        echo "<script>alert('Record Inserted Successfully!');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">
        <a href="index.php" class="btn btn-outline-primary mt-3"><i data-feather="corner-down-left" stroke-width="2"></i> Go Back</a>
        <hr>
        <h1 class="mt-5"><i data-feather="user-plus" width="48" height="48"stroke-width="2"></i> เพิ่มข้อมูลผู้ใช้ใหม่</h1>
        <hr>
        <div class="dataTables_wrapper">
            <form action="" method="post">
                <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                        <label for="firstname" class="form-label">First name</label>
                        <input type="text" class="form-control" name="firstname" required>
                    </div>
                    <div class="p-2 flex-grow-1">
                        <label for="lastname" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="lastname" required>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="p-2 flex-grow-1">
                        <label for="phonenumber">Phone Number</label>
                        <input type="text" class="form-control" name="phonenumber" required>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="p-2 flex-grow-1">
                    <label for="address">Address</label>
                    <textarea name="address" cols="30" rows="3" class="form-control" required></textarea>
                </div>
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-outline-secondary btn-lg">
                    <i data-feather="refresh-cw" stroke-width="2"></i>
                        ล้างข้อมูล
                    </button>
                    <button type="submit" name="insert" class="btn btn-outline-success btn-lg">
                    <i data-feather="save" stroke-width="2"></i>
                        บันทึกข้อมูล
                    </button>
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

</body>

</html>

<script>
    feather.replace();
</script>