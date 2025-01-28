<?php
require('dbconnect.php');
$sql = "SELECT * FROM employee"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 20px;
    }

    h1 {
      color: #343a40;
      font-weight: bold;
    }

    .form-control {
      border-radius: 0;
    }

    .btn-info {
      background-color: #17a2b8;
      border: none;
    }

    .btn-info:hover {
      background-color: #138496;
    }

    .table {
      margin-top: 20px;
    }

    .table thead {
      background-color: #343a40;
      color: #fff;
    }

    .table tbody tr:nth-child(odd) {
      background-color: #e9ecef;
    }

    .btn-success {
      margin-top: 20px;
      background-color: #28a745;
      border: none;
    }

    .btn-success:hover {
      background-color: #218838;
    }
  </style>

  <title>รายชื่อพนักงานทั้งหมด</title>
</head>

<body>
  <div class="container">
    <?php
    require("nav.php");
    ?>
    <h1 class="text-center mt-3">รายชื่อพนักงานทั้งหมด</h1>
    <form action="searchdata.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-6">
          <input type="text" placeholder="กรอกชื่อหรือนามสกุลที่ต้องการค้น" class="form-control" name="emp_data" required>
        </div>
        <div class="col-6">
          <input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info">
        </div>
      </div>

    </form>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>คำนำหน้า</th>
          <th>ชื่อ</th>
          <th>สกุล</th>
          <th>วันเกิด</th>
          <th>ที่อยู่ปัจจุบัน</th>
          <th>ทักษะความสามารถ</th>
          <th>เบอร์โทรศัพท์</th>

        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $order++; ?></td>
            <td><?php echo $row["emp_title"]; ?></td>
            <td><?php echo $row["emp_name"]; ?></td>
            <td><?php echo $row["emp_surname"]; ?></td>
            <td><?php echo $row["emp_birthday"]; ?></td>
            <td><?php echo $row["emp_adr"]; ?></td>
            <td><?php echo $row["emp_skill"]; ?></td>
            <td><?php echo $row["emp_tel"]; ?></td>


          </tr>
        <?php } ?>
      </tbody>
    </table>

    <a href="insertform.php" class="btn btn-success">กรอกข้อมูลพนักงาน</a>

  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>