<?php
session_start();
require 'connect.php';
// Update ---------------

if(isset($_POST['delete_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['delete_patient']);

    $query = "DELETE FROM patient WHERE id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Patient Deleted Successfully";
        header("Location: patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Deleted";
        header("Location: patient.php");
        exit(0);
    }
}

if(isset($_POST['update_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);


    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE  patient SET  name='$name', email='$email' , gender='$gender',address='$address', age='$age',disease='$disease',phone='$phone' WHERE id='$patient_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Patient Updated Successfully";
        header("Location: Patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Updated";
        header("Location: Patient.php");
        exit(0);
    }

}

//--------------------------------------------------

if(isset($_POST['save_Patient']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO patient (name,email,age,gender,address,disease,phone) VALUES ('$name','$email','$age','$gender','$address','$disease','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Patient Created Successfully";
        header("Location: create-patient.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Patient Not Created";
        header("Location: create-patient.php");
        exit(0);
    }
}

?>