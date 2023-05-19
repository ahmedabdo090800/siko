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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        if (isset($_GET['id'])) {
                            $doctorschedule_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM doctorschedule WHERE scheduleId ='$doctorschedule_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $doctorschedule  = mysqli_fetch_array($query_run);
                        ?>
                        <form action="appointment code.php" class="form-horizontal" method="post">
                        <input type="hidden" name="scheduleId" value="<?= $doctorschedule['scheduleId']; ?>">

                            <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="date">
                                    Date
                                    <span class="asteriskField">
                                        *
                                    </span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-addon">

                                        </div>
                                        <input name="scheduleId" value="<?= $doctorschedule['scheduleDate']; ?>" class="form-control" id="date" name="date" type="date" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                    Day
                                    <span class="asteriskField">
                                        *
                                    </span>
                                </label>
                                <div class="col-sm-10">
                                    <select class="select form-control" id="scheduleday" name="scheduleDay" required>
                                        <option value="Monday">
                                            Monday
                                        </option>
                                        <option value="Tuesday">
                                            Tuesday
                                        </option>
                                        <option value="Wednesday">
                                            Wednesday
                                        </option>
                                        <option value="Thursday">
                                            Thursday
                                        </option>
                                        <option value="Friday">
                                            Friday
                                        </option>
                                        <option value="Saturday">
                                            Saturday
                                        </option>
                                        <option value="Sunday">
                                            Sunday
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                                    Start Time
                                    <span class="asteriskField">
                                        *
                                    </span>
                                </label>

                                <div class="col-sm-10">
                                    <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                        <div class="input-group-addon">

                                        </div>
                                        <input name="startTime" value="<?= $doctorschedule['startTime']; ?>" class="form-control" id="starttime" name="starttime" type="time" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="endtime">
                                    End Time
                                    <span class="asteriskField">
                                        *
                                    </span>
                                </label>
                                <div class="col-sm-10">
                                    <div class="input-group clockpicker" data-align="top" data-autoclose="true">
                                        <div class="input-group-addon">

                                        </div>
                                        <input name="endTime" value="<?= $doctorschedule['endTime']; ?>" class="form-control" id="endtime" name="endtime" type="time" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="bookavail">
                                    Availabilty
                                    <span class="asteriskField">
                                        *
                                    </span>
                                </label>
                                <div class="col-sm-10">
                                    <select class="select form-control" id="bookavail" name="bookAvail" required>
                                        <option value="available">
                                            available
                                        </option>
                                        <option value="notavail">
                                            notavail
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-3">
                                        <button type="submit" name="update_appointment" class="btn btn-primary">
                                            Update appointment
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