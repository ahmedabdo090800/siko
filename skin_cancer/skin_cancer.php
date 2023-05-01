<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');

}

?>


<?php
    include('include/header.php')
?>
<div class="container">
    <div class="header  d-flex justify-content-center">
        <h1>Skin Cancer Diagnosis</h1>
    </div>
    <div class="out-img ">
        <output></output>
    </div>

    <div class="form-img d-flex justify-content-center">
        <form action="skin_cancer-img-upload.php" method="POST" enctype="multipart/form-data">
            <label>Upload sample image:</label>
            <input required type="file" name="img" accept=" .jpg, jpeg, .png">
            <div class="buttom">
                <input type="submit" name="submit-img"  value="Upload image">


            </div>
         </form>
    </div>
    



</div>


<?php
    include('include/footer.php')
?>
<?php
    include('include/script.php')
?>