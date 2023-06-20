<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>


<?php
include('include/header.php')
?>




<div class="container mb-5">
<h4>Setting
</h4>

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php
                    $username = $_SESSION['username'];





                    $query = "SELECT * FROM doctor WHERE username= '$username' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $doctor = mysqli_fetch_array($query_run);
                    ?>
                        <form action="code.php" method="POST" >
                            <input type="hidden" name="doctor_id" value="<?= $doctor['id']; ?>">

                            <div class="mb-3">
                                <label>UserName</label>
                                <input type="text" name="username" value="<?= $doctor['username']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="Password" name="password" value="<?= $doctor['password']; ?>" class="form-control">
                            </div>


                            <div class="mb-3">
                                <button type="submit" name="update_doctor" class="btn btn-primary">
                                    Update
                                </button>
                            </div>

                        </form>
                    <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                    ?>
                </div>



            </div>
            
        </div>
            </div>


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>















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