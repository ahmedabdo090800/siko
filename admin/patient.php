
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');

}

?>


<?php
    include('include/header.php')
?>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      
      th {
        background-color: #4CAF50;
        color: white;
      }
    </style>

<div class="container">
     <h1>Appointments</h1>
    <table>
      <tr>
        <th>Date</th>
        <th>Time</th>
        <th>Name</th>
      </tr>
      <tr>
        <td>May 23, 2023</td>
        <td>10:00 AM</td>
        <td>John Doe</td>
      </tr>
      <tr>
        <td>May 24, 2023</td>
        <td>2:30 PM</td>
        <td>Jane Smith</td>
      </tr>
      <tr>
        <td>May 25, 2023</td>
        <td>11:15 AM</td>
        <td>Bob Johnson</td>
      </tr>
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