<?php
 session_start();
 include 'db_connect.php';
include ('nav.php');
include ('head.php');
include 'db_connect.php';
 $msg="";
 if (isset($_POST['login'])) {
      //echo "<pre>";
      //print_r($_POST);
      $username=mysqli_real_escape_string($conn,$_POST['username']);
      $password=mysqli_real_escape_string($conn,$_POST['password']);
      $pass = md5($password);
      $sql=mysqli_query($conn,"select * from client where username='$username' && password='$pass'");
      $num=mysqli_num_rows($sql);
      if ($num>0) {
           //echo "found";
           $row=mysqli_fetch_assoc($sql);
           $_SESSION['USER_ID']=$row['id'];
           $_SESSION['USER_NAME']=$row['username'];
           header("location:userdashboard.php");
      }else{
           $msg="Incorrect username or password !";
      }
 }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/26250a0a21.js" crossorigin="anonymous"></script>
      <title>Login Page</title>

      <style >
  .body{
    background-image: url('van.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }

  </style>

 </head>
 <body class="body">
   <div class="row mt-5">


          <div class="col-lg-6 col-sm-6 mt-5 ">

            </div>

        <div class="col-lg-5 col-sm-6 mt-5    rounded  mt-3 border-dark  "style="--bs-border-opacity: 0.4; background-color: #36454F; color: #fff;" >
          <div class="row">
            <div class="col-4">

            </div>
            <div class="col-lg-3 mt-1 bg-light" style="border-radius: 6px;">
              <div class="text-center">
                <img src="logo.jpg" alt="" style="object-fit: contain; width: 100px; height:80px;">
            </div>
            </div>
          </div>
          <div class="text-start">
            <h4 class="mt-1 ms-3 fw-bolder text-light text-align-center fs-4">Hello! <i class="fa-solid fa-user ms-1" style="Font-size: 30px; color: #FF00FF;"></i></h4>
            </div>

            <div class="error text-danger ms-3">
                 <?php echo $msg ?>
            </div>


          <form action="" class="form"  method="post" >

            <div class="col-md-12">







              <div class="p-1 me-1">


            <label for="exampleFormControlInput1" class="form-label text-light fs-5 fw-bold">Username</label>
            <input type="name" class="form-control opacity-50 border-dark" id="exampleFormControlInput1" name="username" required ="required">

          </div>
          <br>

          <div class=" mb-2 p-1 me-1">
        <label for="exampleFormControlInput1" class="form-label text-light fs-5 fw-bold">Password</label>

        <input type="password" class="form-control opacity-50 border-dark" id="exampleFormControlInput1" name="password" required ="required">

      </div>
      <div class="vertical-center " >
        <input type="submit" class="btn btn-primary" name="login" value="login">

      </div>

  <div class="account fw-bold fs-5 mt-3 ms-3">
    <h5 class="h6 fw-bold text-white">Don't have an account? <a class="text-primary" href="userregister.php">SignUp</a></h5>
  </div>

  </form>
      </div>
        </div>



        <script type="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </body>
 </html>
