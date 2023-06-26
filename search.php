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






<div class="container my-5">
    <form method="post" style="display: flex; justify-content: center; ">
        <div class="ml-5">
            <input type="text" style="width: 500px; height: 35px; margin-right:30px ;" placeholder="Search Patient" name="search">
        </div>
        <div class="ml-3">
            <button class="btn btn-dark btn " name="submit">Search</button>


        </div>
    </form>

    <div class="container my-5">


        <div class="row">
            <div class="col-md-12">

                <table id="datatableid" class="table table-bordered table-striped">

                    <tbody>
                        <?php
                        if (isset($_POST['submit'])) {
                            $search = $_POST['search'];
                            $query = "SELECT * FROM patient WHERE patientFirstName='$search'
                            or patientLastName='$search' or patientLastName='$search'or phone='$search'
                            or disease='$search'";
                            $query_run = mysqli_query($con, $query);

                            if ($query_run)
                                if (mysqli_num_rows($query_run) > 0) {
                                }
                            echo '<thead>
                                <tr> 
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>disease</th>
                                <th>Action</th> 
                                </tr>
                                </thead>';



                          while($row =mysqli_fetch_assoc($query_run))  {
                            echo '<tbody>
<tr>
<td>' . $row['id'] . '</td>
<td>' . $row['patientFirstName'] . '</td> 
<td>' . $row['patientLastName'] . '</td> 
<td>' . $row['phone'] . '</td> 
<td>' . $row['age'] . '</td> 
<td>' . $row['disease'] . '</td> 
<td>
    <a href="patient-view.php?id=' . $row['id'] . '" class="btn btn-info btn-sm">View</a>
    <a href="patient-edit.php?id=' . $row['id'] . '" class="btn btn-success btn-sm">Edit</a>
    <form action="code.php" method="POST" class="d-inline">
        <button type="submit" name="delete_patient" value="' . $row['id'] . '" class="btn btn-danger btn-sm">Delete</button>
    </form>
</td>

</tr> 
</tbody>';}
                        }




                        




                        else {
                            echo "<h5> No Patient Found </h5>";
                        }
                        ?>

                    </tbody>
                </table>
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