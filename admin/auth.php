<?php


if (isset($_GET['email']) && isset($_GET['password']))
{
$email = $_GET['email'];
$password=$_GET['password'];

  if(empty($email)){
    header("Location: login.php?error=Email is required");

  }elseif(empty($password)){
    header("Location: login.php?error=Password is required");

  }else{
    if($_SERVER['REQUEST_METHOD']=='POST')
{ 
  include 'connect.php';
  $email=$_POST['email'];
  $password=$_POST['password'];
  $sql="SELECT * FROM `db_admin`
  where
  email='$email' and password='$password' ";


    $result=mysqli_query($conn, $sql);
    if($result){
      $num=mysqli_num_rows($result);
      if($num>0){
        echo'good';

      }else{
      
        echo'bad';

      }
    }

}

  }

}

?>



