<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}


$login = 0;
$invald = 0;





if (isset($_POST['submit'])) {

    $date = mysqli_real_escape_string($con, $_POST['date']);
    $scheduleday  = mysqli_real_escape_string($con, $_POST['scheduleday']);
    $starttime     = mysqli_real_escape_string($con, $_POST['starttime']);
    $endtime     = mysqli_real_escape_string($con, $_POST['endtime']);
    $bookavail         = mysqli_real_escape_string($con, $_POST['bookavail']);

    //INSERT
    $query = " INSERT INTO doctorschedule (  scheduleDate, scheduleDay, startTime, endTime,  bookAvail)
    VALUES ( '$date', '$scheduleday', '$starttime', '$endtime', '$bookavail' ) ";

    $result = mysqli_query($con, $query);
    // echo $result;
    if ($result) {
?>
        <script type="text/javascript">
            alert('Schedule added successfully.');
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('Added fail. Please try again.');
        </script>
<?php
    }
}
?>






<?php
include('include/header.php')
?>
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Appointment
                            <a href="appointment view.php" class="btn btn-primary float-end"> Edit Appointments</a>
                        </h4>
                    </div>           <!-- Page Heading end-->

                    <!-- panel start -->

<!-- panel start -->
<div class="panel panel-primary">

    <!-- panel heading starat -->

    <!-- panel heading end -->

    <div class="panel-body">
        <!-- panel content start -->
        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7 m-auto">
                        <form class="form-horizontal" method="post">
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
                                        <input class="form-control" id="date" name="date" type="date" required />
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
                                    <select class="select form-control" id="scheduleday" name="scheduleday" required>
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
                                        <input class="form-control" id="starttime" name="starttime" type="time" required />
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
                                        <input class="form-control" id="endtime" name="endtime" type="time" required />
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
                                    <select class="select form-control" id="bookavail" name="bookavail" required>
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
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button class="btn btn-primary mt-3 mb-5  " name="submit" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- panel content end -->
        <!-- panel end -->
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