<?php
include 'db_connect.php';
include 'staff_dashboard.php';

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

  <style>
  .search{
  border-color:#0047AB;

  }
  .search-btn{
    border-color:#0047AB;
  }
  .search-btn:hover{
    background-color: #0047AB;
    color: #FFF;
  }
  </style>
  </head>
  <body class="body">
    <div class="row">
      <div class="col-md-5 ">

      </div>
      <div class="col-md-5 mb-0">
        <!--search btn--->
          <nav class="navbar justify-content-center">
            <form class="form-inline"  method="post">
              <div class="text-start">
                <input class="form-control search mr-sm-2" style="border-color:" name="search" type="search" placeholder="Search"  value="<?php echo @$_GET['search']; ?>" -label="Search">
                <button class="btn  my-2 my-sm-0 search-btn" name="search_btn" type="submit" style="">Search</button>
              </div>
            </form>
        </nav>





      </div>
    </div>
    <div class="row">
      <div class="col-2">

      </div>
      <div class="col-6 sm-4 mx-2 ms-1 " >


        <table class='table shadow-lg me-2' style="border-radius:8px;">
      <thead class='thead text-white' style='background-color: #0047AB;'>
        <tr>
          <th scope='col'>SR_NO:</th>
          <th scope='col'>Fullname</th>

          <th scope='col'>Branch</th>
          <th scope='col'>Region</th>
          <th scope='col'>start_date</th>
          <th scope='col'>end_date</th>
          <th scope='col'>job_status</th>
          <th scope='col'>Edit</th>
          <th scope='col'>Delete</th>
        </tr>
      </thead>





        <?php

         $limit = 100;
         $getQuery = "select *from postbank_staff";
         $result = mysqli_query($conn, $getQuery);

         $total_rows = mysqli_num_rows($result);
          $total_pages = ceil ($total_rows / $limit);
          if (!isset ($_GET['page']) ) {

             $page_number = 1;

         } else {

             $page_number = $_GET['page'];

         }
           $initial_page = ($page_number-1) * $limit;




        if(isset($_POST['search_btn'])){
           $searchKey = $_POST['search'];
           $sql = "SELECT *  FROM postbank_staff WHERE  (SR_NO LIKE  '%$searchKey%')
           OR (Firstname LIKE  '%$searchKey%') OR (Middlename LIKE  '%$searchKey%')OR (Surname LIKE  '%$searchKey%') ";
           $result = mysqli_query($conn,$sql);
           while ($raw_data = mysqli_fetch_assoc($result)) {
                   $SR_NO = $raw_data['SR_NO'];
                    $Firstname = $raw_data['Firstname'];
                    $Fullname = $raw_data['Fullname'];
                    $Surname = $raw_data['Surname'];
                     $Middlename = $raw_data['Middlename'];
                     $Branch = $raw_data['Branch'];
                     $Region = $raw_data['Region'];
                     $start_date = $raw_data['start_date'];
                     $end_date = $raw_data['end_date'];
                     $job_status = $raw_data['job_status'];

                       echo "


                     <tr>
                     <td>$SR_NO</td>
                     <td>$Fullname</td>
                     <td>$Branch</td>
                     <td>$Region</td>
                     <td>$start_date</td>
                     <td>$end_date</td>
                     <td>$job_status</td>

                   <td><button type='button' class='btn btn-success editbtn' style='background-color:#0047AB;'>
                    <i class='fa-solid fa-pen-to-square'></i> </button></td>

                    <td><button type='button' class='btn  deletebtn'
                    style='background-color:#fff;'>
                     <i class='fa-solid fa-trash text-danger' style='font-size: 18px;' ></i> </button></td>


                     </tr>





                         ";

                     }
        }else {
          $getQuery = "SELECT *FROM postbank_staff ";

      $result = mysqli_query($conn, $getQuery);
          while ($raw_data = mysqli_fetch_assoc($result)) {
                  $SR_NO = $raw_data['SR_NO'];
                   $Firstname = $raw_data['Firstname'];
                     $Fullname = $raw_data['Fullname'];
                   $Surname = $raw_data['Surname'];
                    $Middlename = $raw_data['Middlename'];
                    $Branch = $raw_data['Branch'];
                    $Region = $raw_data['Region'];
                    $start_date = $raw_data['start_date'];
                  $end_date = $raw_data['end_date'];
                    $job_status = $raw_data['job_status'];

                      echo "

                    <tr>
                      <td>$SR_NO</td>
                      <td>$Fullname</td>
                      <td>$Branch</td>
                      <td>$Region</td>
                      <td>$start_date</td>
                      <td>$end_date</td>
                      <td>$job_status</td>

                  <td><button type='button' class='btn btn-success editbtn' style='background-color:#0047AB;'>
                   <i class='fa-solid fa-pen-to-square'></i> </button></td>
                   <td><button type='button' class='btn  deletebtn'
                   style='background-color:#fff;' >
                    <i class='fa-solid fa-trash text-danger' style='font-size: 18px;' ></i> </button></td>


                    </tr>





                        ";

                    }
        }





         ?>
         </tbody>
         </table >

      </div>
    </div>




  <?php include ('deletemodal.php');?>
    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

              $('#deletemodal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function () {
                  return $(this).text();
              }).get();

              console.log(data);
                $('#deletemodal').modal('show');

                $('#delete_id').val(data[0]);




            });
        });

    </script>

  <?php include('modal.php');?>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#Fullname').val(data[1]);
                $('#Branch').val(data[2]);
                $('#Region').val(data[3]);
                $('#start_date').val(data[4]);
                $('#end_date').val(data[5]);
                $('#job_status').val(data[6]);

            });
        });

    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
  </body>
</html>
