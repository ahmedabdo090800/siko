<?php
session_start();
require 'connect.php';
// Update ---------------

if(isset($_POST['delete_appointment']))
{
    $scheduleId = mysqli_real_escape_string($con, $_POST['delete_appointment']);

    $query = "DELETE FROM doctorschedule WHERE scheduleId='$scheduleId ' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "appointment Deleted Successfully";
        header("Location: appointment view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "appointment Not Deleted";
        header("Location: appointment view.php");
        exit(0);
    }
}

if(isset($_POST['update_appointment']))
{
    $scheduleId  = mysqli_real_escape_string($con, $_POST['scheduleId']);


    $scheduleDate = mysqli_real_escape_string($con, $_POST['scheduleDate']);
    $scheduleDay = mysqli_real_escape_string($con, $_POST['scheduleDay']);
    $startTime = mysqli_real_escape_string($con, $_POST['startTime']);
    $endTime = mysqli_real_escape_string($con, $_POST['endTime']);
    $bookAvail = mysqli_real_escape_string($con, $_POST['bookAvail']);


    $query = "UPDATE  doctorschedule SET  scheduleDate='$scheduleDate', scheduleDay='$scheduleDay' , startTime='$startTime',endTime='$endTime', bookAvail='$bookAvail' WHERE scheduleId='$scheduleId' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "appointment Updated Successfully";
        header("Location: appointment view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "appointment  Not Updated";
        header("Location: appointment view.php");
        exit(0);
    }

}

//--------------------------------------------------

