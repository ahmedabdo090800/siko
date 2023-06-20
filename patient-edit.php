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


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Patient Update</title>
</head>

<body>

    <div class="container mb-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        if (isset($_GET['id'])) {
                            $patient_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM patient WHERE id='$patient_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $patient = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="patient_id" value="<?= $patient['id']; ?>">

                                    <div class="mb-3">
                                        <label>First Name</label>
                                        <input type="text" name="fname" value="<?= $patient['patientFirstName']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" value="<?= $patient['patientLastName']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?= $patient['email']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Gender</label>
                                        <input type="text" name="gender" value="<?= $patient['gender']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>address</label>
                                        <input type="text" name="address" value="<?= $patient['address']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Age</label>
                                        <input type="text" name="age" value="<?= $patient['age']; ?>" class="form-control">
                                    </div>


                                    <div class="mb-3">
                                        <label>disease</label>
                                        <input type="text" name="disease" style="height: 100px;" value="<?= $patient['disease']; ?>" class="form-control">
                                    </div>


                                    <div class="mb-3">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="<?= $patient['phone']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_patient" class="btn btn-primary">
                                            Update Patient
                                        </button>
                                    </div>

                                </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
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