<?php include 'header.php';
$user=$_SESSION['user'];
?>
<div class="container">
<div class="row">
<div class="col-sm-3 thumbnail" style="border-width:0px">
<?php 
include 'sidebar_lab.php';
?>



</div>
<div class="col-sm-9">
<?php
date_default_timezone_set("Africa/Nairobi");
$date=date('Y-M-d : h:m:s');
if(isset($_GET['view'])){
    include 'viewequipments.php';
}else if(isset($_GET['add'])){
    include 'updateequipments.php';
}else if(isset($_GET['borrowed'])){
    include 'borrowed.php';
}else if(isset($_GET['broken'])){
    include 'broken.php';
}else if(isset($_GET['borrow'])){
    include 'borrowed.php';
}
else if(isset($_GET['return'])){
    include 'return.php';
}else if(isset($_GET['bid'])){
$bid=$_GET['bid'];
$update="UPDATE borrowed_equip SET status='returned',date_time_returned='$date' WHERE b_id='$bid'";
$query=$connect->query($update);
if($query){
    echo "<div class='alert alert-success'>Updated successfully</div>";
}else{
    echo "<div class='alert alert-danger'>Error occured</div>";
}
}

else if(!isset($_GET['view'])&& !isset($_GET['add'])&!isset($_GET['bid'])&&!isset($_GET['borrowed'])&&!isset($_GET['broken'])&&!isset($_GET['borrow'])&&!isset($_GET['return'])){
    include 'updateequipments.php';
}
?>

</div>
</div>
</div>


<?php include 'footer.php' ?>