
<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');

}

?>


<?php
    include('include/header.php')
?>
        <div class="row">
            <div class="col-md-12 ">
                <div class="card ml-3 mb-5">
                    <div class="card-header ">
                        <h4>appointment  Details
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered ">
                        <thead>
                                <tr class="filters">
                                    <th class="col-1"><input type="text" class="form-control" placeholder="Name" disabled></th>
                                    <th class="col-1" ><input type="text" class="form-control" placeholder="Contact No." disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <th class="col-1"><input type="text" class="form-control" placeholder="Day" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Date" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Start" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="End" disabled></th>
                                    <th><input type="text" class="form-control" placeholder= "created_from" disabled></th>
                                </tr>
                            </thead>
                            <tbody>

                            
                            <?php 


                            $res=mysqli_query($con,"SELECT a.*, b.*,c.*
                                                    FROM patient a
                                                    JOIN appointment b
                                                    On a.icPatient = b.patientIc
                                                    JOIN doctorschedule c
                                                    On b.scheduleId=c.scheduleId
                                                    Order By scheduleDate DESC");
                                  if (!$res) {
                                    printf("Error: %s\n", mysqli_error($con));
                                    exit();
                                }
                            while ($appointment=mysqli_fetch_array($res)) {
                                
                                if ($appointment['status']=='process') {
                                    $status="danger";
                                    $icon='remove';
                                    $checked='';

                                } else {
                                    $status="success";
                                    $icon='ok';
                                    $checked = 'disabled';
                                }

                                
                              
                                
                             
                                

                                

                                echo "<tbody>";
                                echo "<tr class='$status'>";
                                    echo "<td>" . $appointment['patientFirstName'] . "</td>";
                                    echo "<td>" . $appointment['phone'] . "</td>";
                                    echo "<td>" . $appointment['email'] . "</td>";
                                    echo "<td>" . $appointment['scheduleDay'] . "</td>";
                                    echo "<td>" . $appointment['scheduleDate'] . "</td>";
                                    echo "<td>" . $appointment['startTime'] . "</td>";
                                    echo "<td>" . $appointment['endTime'] . "</td>";
                                    echo "<td>" . $appointment['created_from'] . "</td>";

        
                            }

                            $query = "SELECT * FROM app_appointment Order By date_app DESC";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $appointment_app)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $appointment_app['name_app']; ?></td>
                                        <td><?= $appointment_app['phone_app']; ?></td>
                                        <td><?= $appointment_app['email_app'] ?></td>
                                        <td><?= $appointment_app['day_app']; ?></td>
                                        <td><?= $appointment_app['date_app']; ?></td>
                                        <td><?= $appointment_app['start_time_app']; ?></td>  
                                        <td><?= $appointment_app['end_time_app']; ?></td>  
                                        <td><?= $appointment_app['created_from']; ?></td>  
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                    
echo "</tbody>";
echo "</table>";
echo "<div class='panel panel-default'>";
echo "<div class='col-md-offset-3 pull-right'>";
echo "</div>";
echo "</div>";



                               
                            
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                       echo "<button class='btn btn-primary' type='submit' value='Submit' name='submit'>Refresh</button>";
                        echo "</div>";
                        echo "</div>";
                        ?>





<?php
    include('include/footer.php')
?>
<?php
    include('include/script.php')
?>

<script type="text/javascript">
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   // Use get instead of post.
   req.open("GET", url, true);
   req.send(null);
}
</script>


 
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
        <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var appid = element.attr("id");
var info = 'id=' + appid;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteappointment.php",
   data: info,
   success: function(){
 }
});
  $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
 }
return false;
});
});
</script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <script type="text/javascript">
            /*
            Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            */
            $(document).ready(function(){
                $('.filterable .btn-filter').click(function(){
                    var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function(e){
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9') return;
                    /* Useful DOM data and selectors */
                    var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                    /* Dirtiest filter function ever ;) */
                    var $filteredRows = $rows.filter(function(){
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clean previous no-result if exist */
                    $table.find('tbody .no-result').remove();
                    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                    }
                });
            });
        </script>


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