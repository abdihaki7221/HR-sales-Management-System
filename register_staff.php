<?php
include 'db_connect.php';

if (isset($_POST['add_staff'])) {
    $Firstname = $_POST['Firstname'];
    $Surname = $_POST['surname'];
    $Middlename = $_POST['Middlename'];
    $Branch = $_POST['branch'];
    $Region = $_POST['regions'];
    $start_date = $_POST['start_date'];




    $code = rand(9999999, 1111111);

  $insert_sql = "INSERT INTO postbank_staff(Firstname,Surname,Middlename,Fullname,Branch,Region,start_date,end_date,job_status,SR_NO)
  VALUES('$Firstname','$Surname','$Middlename',CONCAT('$Firstname',' ','$Middlename',' ','$Surname'),'$Branch','$Region','$start_date','','In-Service','SR/$code ')";
  $result_insert = mysqli_query($conn,$insert_sql);
  if ($result_insert) {
    echo "<script>alert ('staff added successfully ')</script>";
  }else {
  echo "<script>alert ('ERROR! Error occured ')</script>";
  };

}


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <title></title>
    <style>
      .form-control{

        font-size: 18px;

      }
      .register{
        font-size: 16px;
        font-weight: bold;
      }
      .regions{
        font-size: 16px;
      }
      .option_active{
        font-size: 18px;
      }

    </style>
  </head>
  <body class="body">
    <div class="row">
      <div class="col-3">


      </div>

      <div class="col-8  sm-4 shadow p-2 mt-5 ms-2 border" style="border-color:#0047AB; " >
        <form action="" method="post"  >

            <h4 class="register">Register Staff</h4>
                    <!--staff name-->
                 <div class="input-group mb-3" id="inputGroup-sizing-default">


                    <input type="text text-primary" class="form-control" name="Firstname"  placeholder="Enter Firstname" aria-label="Username" aria-describedby="basic-addon1" required ="required">

                 </div>





                 <!--sirname name-->
                 <div class="input-group mb-3 mt-3 " id="inputGroup-sizing-default">

                    <input type="text " class="form-control" name="surname"  placeholder="Enter Surname" aria-label="Username" aria-describedby="basic-addon1" required ="required">


                 </div>
                  <!--middle name-->
                 <div class="input-group mb-3 mt-3 " id="inputGroup-sizing-default">

                    <input type="email " class="form-control" name="Middlename"  placeholder="Enter Middlename" id="username" aria-label="Username" aria-describedby="basic-addon1" >


                 </div>

                 <!-- start date-->
                <div class="input-group mb-3 mt-3 " id="inputGroup-sizing-default">
                  <label for="Select Date of Appointment" class="regions">Select Date of Appointment </label>
                   <input type="date" class="form-control" name="start_date"  value="Enter appointment date" id="username" aria-label="Username" aria-describedby="basic-addon1" required="required" >


                </div>


                 <!--branch-->
                 <label for="choose branch name" class="regions">Select Branch </label>
                 <select name="branch" id="framework" class="form-control selectpicker" data-live-search="true" >
                   <option value="selected">Select Branch</option>

                   <?php
                   $select_branches = "SELECT * FROM branches";
                   $exec_query = mysqli_query($conn,$select_branches);
                   while ($fetch_data = mysqli_fetch_assoc($exec_query)) {
                     $branch_name = $fetch_data['branch_name'];
                     echo "    <option value='$branch_name'>$branch_name</option>";
                   }


                    ?>


                 </select>

                 <!--regions-->
                 <label for="choose branch name" class="regions mt-1">Select Region</label>
                 <select name="regions" id="framework" class="form-control selectpicker mt-1" data-live-search="true" >
                    <option value="selected " >Select Region</option>
                   <?php
                   $select_regions = "SELECT * FROM regions";
                   $exec_query = mysqli_query($conn,$select_regions);
                   while ($fetch_data = mysqli_fetch_assoc($exec_query)) {
                     $region_name = $fetch_data['region_name'];
                     echo "<option value='$region_name'>$region_name</option>";
                   }


                    ?>

                 </select>



                 <!--button-->
                   <div class="d-flex justify-content-center mt-1 mb-2">
                       <input type="submit" name="add_staff" class="btn  text-white p-1 my-2"
                       value="Add Staff" style="background-color:#0047AB; color:#fff; height:50px; width:90px; border-radius:10px; font-size:18px;">
                     </div>







    </form>
</div>
    </div>




  </body>
</html>
<script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();


 });
 </script>
 <script>
 $(document).ready(function(){
  $('.selectpicker').selectpicker();


  });
  </script>
