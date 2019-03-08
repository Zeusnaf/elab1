<?php include 'header.php';
$user=$_SESSION['user'];
?>
<div class="container">
<div class="row">
<div class="col-sm-3 thumbnail" style="border-width:0px">
<?php 
include 'sidebar.php';
?>



</div>
<div class="col-sm-9">
<?php
if(isset($_GET['add'])){
    include 'add.php';
}else if(isset($_GET['activate'])){
    include 'activate.php';
}
else if(isset($_GET['delete'])){
    include 'delete.php';
}
else if(!isset($_GET['activate'])&& !isset($_GET['add'])&& !isset($_GET['delete'])){
    include 'add.php';
}
?>

</div>
</div>
</div>


<?php include 'footer.php' ?>