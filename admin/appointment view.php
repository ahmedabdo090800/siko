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



    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>appointment  Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Book Availilty</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM doctorschedule";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $doctorschedule)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $doctorschedule['scheduleDate']; ?></td>
                                                <td><?= $doctorschedule['scheduleDay']; ?></td>
                                                <td><?= $doctorschedule['startTime']; ?></td>
                                                <td><?= $doctorschedule['endTime']; ?></td>
                                                <td><?= $doctorschedule['bookAvail']; ?></td>
                                                <td>
                                                    <a href="appointement edit.php?id=<?= $doctorschedule['scheduleId']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="appointment code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_appointment" value="<?=$doctorschedule['scheduleId'];?>" class="btn btn-danger btn-sm">Delete</button>
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



















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