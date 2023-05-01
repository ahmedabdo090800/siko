<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');

}

?>


<?php
    include('include/header.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/953cb33ad6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>skino</title>
</head>
<body>
<div class="container">
    <div class="header  d-flex justify-content-center" >
        <h1>Skin Cancer Diagnosis</h1>
    </div>
    <div class="out-img ">
        <output></output>
    </div>

    <div class="form-img d-flex " style="display: flex; align-items: center;">
        <form action="skin-img-upload.php" method="POST" enctype="multipart/form-data">
            <label>Upload sample image:</label>
            <input required type="file" name="img" accept=" .jpg, jpeg, .png">
            <div class="buttom">
                <input type="submit" name="submit-img"  value="Upload image">


            </div>
         </form>
    </div>
    



</div>



    

<script src="assets/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="assets/js/main.js "></script>
</body>
</html>