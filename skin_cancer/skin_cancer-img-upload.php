
<?php
require_once('skin_cancer-function.php');
if(isset($_POST['submit-img'])){
    $extension= pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    
     
    $dst_fname = getcwd() . '/skin-images/'. time(). uniqid(rand()) . '.' . $extension;
    $dst_fname = str_replace('\\', '/', $dst_fname); 
    move_uploaded_file($_FILES["img"]["tmp_name"], $dst_fname); 
    $result = classify_image($dst_fname);

} else {
    header("Location: skin_cancer.php");
    exit();
}

?>



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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container">
<table class="table">
  <thead class="thead-dark" style="text-align: center;">
    <tr>
      <th scope="col">Result</th>
      <th scope="col">Proplatiy of benign</th>
      <th scope="col">Proplatiy of malignant</th>
    </tr>
  </thead>
  <tbody style="text-align: center;" >
    <tr>
      <th scope="row"><?php echo $result['class_name'];?></th>
      <td><?php echo $result['prob_benign'];?></td>
      <td><?php echo $result['prob_malignant'];?></td>
    </tr>
  </tbody>
</table>
</div>

<?php
    include('include/footer.php')
?>
<?php
    include('include/script.php')
?>
