<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');

}

?>


<?php
    include('include/header.php')
?>



















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