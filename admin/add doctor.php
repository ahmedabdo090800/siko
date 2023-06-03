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

<?php include('message.php'); ?>

<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>Add Doctor 
                    <a href="setting.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="appointment code.php" method="POST">

                    <div class="mb-3">
                        <label>Doctor Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>UserName</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    
                    <div class="mb-3">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Gender</label>
                        <input type="text" name="gender" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>address</label>
                        <input type="text" name="address" class="form-control">
                    </div>

     
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <button type="submit" name="save_doctor" class="btn btn-primary">Save Doctor</button>
                    </div>

                </form>
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