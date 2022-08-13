<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

  $vid = $_GET['viewid'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $temp = $_POST['temp'];
  $pres = $_POST['pres'];


  $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
  if ($query) {
    echo '<script>alert("تمت إضافة التاريخ الطبي.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("هناك خطأ ما. حاول مرة اخرى")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>التقرير الطبي للمريض</title>

  <!-- bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <!-- fontawesome  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- google font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital@1&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../../css/style2.css">
</head>

<body>
  <div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">
      <?php include('include/header.php'); ?>
      <div class="main">
        <div class="container" id="container">
          <div class="tablediv">

            <?php
            $vid = $_GET['viewid'];
            $ret = mysqli_query($con, "select * from tblpatient where ID='$vid'");
            $cnt = 1;
            while ($row = mysqli_fetch_array($ret)) {
            ?>
              <table class="table medhistory">
                <tr align="center">
                  <th colspan="4">
                    تفاصيل المريض</th>
                </tr>

                <tr>
                  <th scope>اسم المريض</th>
                  <td><?php echo $row['PatientName']; ?></td>
                  <th scope>البريد الالكتروني</th>
                  <td><?php echo $row['PatientEmail']; ?></td>
                </tr>
                <tr>
                  <th scope>رقم الهاتف</th>
                  <td><?php echo $row['PatientContno']; ?></td>
                  <th>Patient Address</th>
                  <td><?php echo $row['PatientAdd']; ?></td>
                </tr>
                <tr>
                  <th>جنس المريض</th>
                  <td><?php echo $row['PatientGender']; ?></td>
                  <th>عمر المريض</th>
                  <td><?php echo $row['PatientAge']; ?></td>
                </tr>
                <tr>

                  <th>ملاحظة الدكتور حول المريض</th>
                  <td><?php echo $row['PatientMedhis']; ?></td>
                  <th>تاريخ انشاء التقرير</th>
                  <td><?php echo $row['CreationDate']; ?></td>
                </tr>

              <?php } ?>
              </table>
              <?php

              $ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");

              ?>
              <table id="datatable" class="table medhistory" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <tr style="text-align:center">
                  <th colspan="8">معلومات المريض عند اخر زيارة للدكتور</th>
                </tr>
                <tr>
                  <th>التسلسل</th>
                  <th>ضغط الدم</th>
                  <th>الوزن</th>
                  <th>سكرالدم</th>
                  <th>درجة حرارة الجسم</th>
                  <th>العلاج المعطى</th>
                  <th>تاريخ الزيارة</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                  <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $row['BloodPressure']; ?></td>
                    <td><?php echo $row['Weight']; ?></td>
                    <td><?php echo $row['BloodSugar']; ?></td>
                    <td><?php echo $row['Temperature']; ?></td>
                    <td><?php echo $row['MedicalPres']; ?></td>
                    <td><?php echo $row['CreationDate']; ?></td>
                  </tr>
                <?php $cnt = $cnt + 1;
                } ?>
              </table>

          </div>
        </div>
      </div>
    </div>

    <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>
    <!-- end: FOOTER -->
  </div>
  <!-- start: MAIN JAVASCRIPTS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <script src="vendor/modernizr/modernizr.js"></script>
  <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="vendor/switchery/switchery.min.js"></script>
  <!-- end: MAIN JAVASCRIPTS -->
  <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
  <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
  <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
  <script src="vendor/autosize/autosize.min.js"></script>
  <script src="vendor/selectFx/classie.js"></script>
  <script src="vendor/selectFx/selectFx.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
  <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
  <!-- start: CLIP-TWO JAVASCRIPTS -->
  <script src="assets/js/main.js"></script>
  <!-- start: JavaScript Event Handlers for this page -->
  <script src="assets/js/form-elements.js"></script>
  <script>
    jQuery(document).ready(function() {
      Main.init();
      FormElements.init();
    });
  </script>
  <!-- end: JavaScript Event Handlers for this page -->
  <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>