<?php
session_start();
require 'connect.php';

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
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <link href="assets/css/datatables.min.css" rel="stylesheet"/>


    <title>Patient</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Details
                            <a href="create-patient.php" class="btn btn-primary float-end">Add Patient</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table id="datatableid" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>disease</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM patient";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $patient)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $patient['id']; ?></td>
                                                <td><?= $patient['patientFirstName']; ?></td> 
                                                <td><?= $patient['patientLastName']; ?></td> 
                                                <td><?= $patient['phone']; ?></td>
                                                <td><?= $patient['age']; ?></td>
                                                <td><?= $patient['disease']; ?></td>
                                                <td>
                                                    <a href="patient-view.php?id=<?= $patient['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="patient-edit.php?id=<?= $patient['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_patient" value="<?=$patient['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                        <h4> 
                            <a href="search.php" class="btn btn-dark float-end">Search</a>
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    
    <script >
     $(document).ready(function () {
    $('datatableid').DataTable();
});
</script>


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