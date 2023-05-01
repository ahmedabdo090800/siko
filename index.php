<?php
session_start();
require 'connect.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');

}

$sql="SELECT age FROM patient ORDER BY age";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }
mysqli_close($con);

?>



<?php
    include('include/header.php')
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Patient</div>
                                    <h3>
                                        Number : <?php
                                            echo $rowcount;
                                        ?>
                                    </h3>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="patient.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">appointement</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
 
                        </div>
                    </div>
<?php
    include('include/footer.php')
?>
<?php
    include('include/script.php')
?>




                    





<!-- <body>
   <h1>wellcome Dr
    <?php
    echo $_SESSION['username'];

    ?>
   </h1> 
   <div class="container">
    <a href="logout.php" class="btn btn-primary " >Logout</a>
   </div>


</body>
</html> -->