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


    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE  patient SET patientFirstName='$fname',patientLastName ='$lname', email='$email' , gender='$gender',address='$address', age='$age',disease='$disease',phone='$phone' WHERE id='$patient_id' ";
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
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $disease = mysqli_real_escape_string($con, $_POST['disease']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $notes = mysqli_real_escape_string($con, $_POST['notes']);
    $medicine = mysqli_real_escape_string($con, $_POST['medicine']);
    $chronic = mysqli_real_escape_string($con, $_POST['chronic']);

    $query = "INSERT INTO patient (patientFirstName,patientLastName,email,age,gender,address,disease,phone,notes,medicine,chronic) VALUES ('$fname','$lname','$email','$age','$gender','$address','$disease','$phone','$notes','$medicine','$chronic')";

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


if(isset($_POST['update_doctor']))
{
    $doctorusername  = mysqli_real_escape_string($con, $_POST['username']);
    $doctor_id  = mysqli_real_escape_string($con, $_POST['doctor_id']);
    $doctorpassword = mysqli_real_escape_string($con, $_POST['password']);



    $query = "UPDATE  doctor SET  username='$doctorusername', password='$doctorpassword' WHERE id='$doctor_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    ?>
    <script type="text/javascript">
        alert('Updating successfully,Please login again');
        window.location="http://localhost/siko/login.php";
    </script>

<?php
} else {
?>
        $_SESSION['message'] = "  Not Updated";
        header("Location: setting.php");
        exit(0);
<?php
}












