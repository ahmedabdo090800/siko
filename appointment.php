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
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                    $query = "SELECT a.*, b.*,c.*
                                    FROM patient a
                                    JOIN appointment b
                                    On a.icPatient = b.patientIc
                                    JOIN doctorschedule c
                                    On b.scheduleId=c.scheduleId
                                    WHERE DATE (scheduleDate)=CURDATE()";
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

                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Appointments Today </h5>";
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