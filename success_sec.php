<?php include 'header.php';
$user=$_SESSION['user'];
?>
<div class="container">
<div class="row">
<div class="col-sm-3 thumbnail" style="border-width:0px">
<?php 
include 'sidebar_sec.php';
?>



</div>
<div class="col-sm-9">
<?php
if(isset($_GET['add'])){
    include 'addequipments.php';
}else if(isset($_GET['view'])){
    include 'viewequipments.php';
}

else if(!isset($_GET['add'])&& !isset($_GET['view'])){
    include 'addequipments.php';
}
?>

</div>
</div>
</div>


<?php include 'footer.php' ?>