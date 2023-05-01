<?php
$login=0;
$invald=0;
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
        echo'cood';
      }else{
        echo'klk';

      }
    }

}
?>






<?php
$login=0;
$invald=0;
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
        $login=1;
        session_start();
        $_SESSION['email']=$email; header("location:home.php"); 
      }else{
        $invald=1;


      }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>loginAdmin</title>
</head>
<body>

<div class="d-flex justify-content-center  align-items-center " style=" min-height: 100vh;" >
<form class="p-5 rounded shadow"
      style=" width:30rem;"
      action="login.php"
      method="POST"

>

    <h1 class=" text-center pb-5 pt-5 display-4">Login Admin</h1>

<?php
if($invald){

  echo'
  <div class="alert alert-danger" role="alert">
  Invaild Login
  <p>Please check your Email and password</p> 
  

</div>
  ';

}

?>









    

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">LOGIN</button>
</form>
</div>
   




</body>
</html>
