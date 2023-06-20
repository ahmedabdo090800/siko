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



//---------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------

if(isset($_POST['update_db_admin']))
{
    $adminusername  = mysqli_real_escape_string($con, $_POST['username']);
    $db_admin_id  = mysqli_real_escape_string($con, $_POST['db_admin_id']);
    $adminepassword = mysqli_real_escape_string($con, $_POST['password']);



    $query = "UPDATE  db_admin SET  username='$adminusername', password='$adminepassword' WHERE id='$db_admin_id' ";
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



//--------------------------------------------------

if(isset($_POST['save_doctor']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO doctor (name,username,password,email,age,gender,address,phone) VALUES ('$name','$username','$password','$email','$age','$gender','$address','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Doctor Created Successfully";
        header("Location: add doctor.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Doctor Not Created";
        header("Location: add doctor.php");
        exit(0);
    }
}



if(isset($_POST['save_admin']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, $_POST['email']);


    $query = "INSERT INTO db_admin (name,username,password,email) VALUES ('$name','$username','$password','$email')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Admin Created Successfully";
        header("Location: add admin.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Admin Not Created";
        header("Location: add admin.php");
        exit(0);
    }
}


?>









