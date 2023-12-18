<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>

    <div class="container">
        <h1 class="mt-5 text-center"><i data-feather="users" width="48" height="48"></i> Users List</h1>
        <div class="text-end">
            <a href="insert.php" class="btn btn-outline-success btn-lg"><i data-feather="user-plus"></i>
                เพิ่มผู้ใช้ใหม่</a>
        </div>
        <div class="dataTables_wrapper mt-5">
            <table id="mytable" class="table table-bordered table-hover table-md"> <!-- table-striped -->
                <thead>
                    <th>#</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>Email</th>
                    <th>ที่อยู่</th>
                    <th>เบอร์โทร</th>
                    <th></th>
                    <th></th>
                </thead>

                <tbody>
                    <?php

                    include_once('functions.php');
                    $fetchdata = new DB_con();
                    $sql = $fetchdata->fetchdata();
                    while ($row = mysqli_fetch_array($sql)) {

                        ?>

                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                            <td>
                                <?php echo $row['phonenumber']; ?>
                            </td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-sm"><i
                                        data-feather="edit"></i></a>
                            </td>
                            <td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm"><i
                                        data-feather="trash-2"></i></a></td>
                        </tr>

                        <?php

                    }
                    ?>
                </tbody>
            </table>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</body>

</html>


<script>

    let table = new DataTable('#mytable', {
        pagingType: 'full_numbers',
        order: [[0, 'asc']],
        processing: true,
        //serverSide: true,
        //stateSave: true,
    });

    table.on('click', 'tbody tr', function () {
        let data = table.row(this).data();

        alert('ข้อมูลผู้ใช้ลำดับ ' + data[0] + " | " + data[1]);
    });


    feather.replace();
</script>