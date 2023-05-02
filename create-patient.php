<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');

}
?>

<?php
    include('include/header.php')
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Patient Create</title>
</head>
<body>
  
    <div class="container mb-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Add 
                            <a href="patient.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php " method="POST">

                            <div class="mb-3">
                                <label>Patient Name</label>
                                <input type="text" name="name" class="form-control">
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
                                <label>Diagnoses</label>
                                <textarea class="form-control" name="disease" cols="20" rows="5"></textarea>
                            </div>
                            

                            
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_Patient" class="btn btn-primary">Save Patient</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

















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