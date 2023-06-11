<?php
include 'db_connect.php';

    if(isset($_POST['updatedata']))
    {
        $id = $_POST['update_id'];

        $Firstname = $_POST['Firstname'];
        $Surname = $_POST['Surname'];
        $Middlename = $_POST['Middlename'];
        $Branch = $_POST['Branch'];
        $Region = $_POST['Region'];
        $end_date = $_POST['end_date'];
        $job_status = $_POST['job_status'];


        $query = "UPDATE postbank_staff SET Firstname='$Firstname', Surname='$Surname',
        Middlename='$Middlename', Branch='$Branch',Region='$Region',
        end_date='$end_date',job_status='$job_status'

         WHERE SR_NO='$id'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
           echo '<script> alert("Data Updated"); </script>';
            header("Location:staff_dashboard.php?inservice");
        }
        else
        {

        }
    }
?>
