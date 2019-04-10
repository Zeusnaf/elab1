<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>View Equipments</h3></span>
<div class="row">
<div class="col-sm-3">
<form action="" method="POST">
<div class="form-group" style="display:inline">
<input type="text" name="sname" id="" class="form-control">
<button type="submit" class="btn btn-primary" name="search">Search</button>
</div>
</form>
</div>
<div class="col-sm-9"></div>
</div>
<hr>
<div class="row" style="margin-top:-40px">
<div class="col-sm-12">
<table class="table table-bordered table-striped table-responsive table-condensed table-hovered">
<thead>
<tr>
<th>Name</th>
<th>Type</th>
<th>Quantity Received</th>
<th>Date Received</th>
<th>Quantity Remaining</th>
<th>Seller</th>
<th>status</th>
<th>Action</th>


</tr>
</thead>
<tbody>
<?php
//fetching array
if(isset($_POST['search'])){
$sname=$_POST['sname'];
$select="SELECT * FROM equipments WHERE ename LIKE '%$sname%'";
$que=$connect->query($select);
while($data=$que->fetch_object()){
    $eid=$data->e_id;
    $ename=$data->ename;
    $etype=$data->etype;
    $quantity=$data->quantity;
    $date=$data->date;
    $remaining=$data->remaining;
    $units=$data->units;
    $seller=$data->seller;
    $status=$data->status;
    
    echo "<form method='POST' action=''>
    <input type='text' name='e_id[]' value='$eid' style='visibility:hidden'>
    <tr>

    <td>$ename</td>
    <td>$etype</td>
    <td>$quantity $units</td>
    <td>$date</td>
    <td>$remaining $units</td>
    <td>$seller</td>
    <td>$status</td>
    <td>";
   //action
        echo "<button type='submit' name='delete' class='btn btn-danger'>Delete</button></td>
        </tr></form>";
    
    
    
    
}



















}else{
    $select="SELECT * FROM equipments";
    $que=$connect->query($select);
    while($data=$que->fetch_object()){
        $eid=$data->e_id;
        $ename=$data->ename;
        $etype=$data->etype;
        $quantity=$data->quantity;
        $date=$data->date;
        $remaining=$data->remaining;
        $units=$data->units;
        $seller=$data->seller;
        $status=$data->status;
        
        echo "<form method='POST' action=''>
        <input type='text' name='e_id[]' value='$eid' style='visibility:hidden'>
        <tr>
    
        <td>$ename</td>
        <td>$etype</td>
        <td>$quantity $units</td>
        <td>$date</td>
        <td>$remaining $units</td>
        <td>$seller</td>
        <td>$status</td>
        <td>";
       //action
            echo "<button type='submit' name='delete' class='btn btn-danger'>Delete</button></td>
            </tr></form>";
        
        
        
        
    }
}

if(isset($_POST['delete'])){
    foreach($_POST['e_id'] as $e_id){
        $update="DELETE  FROM equipments  WHERE e_id='$e_id'";
        $quer=$connect->query($update);
        if($quer){
            echo "<div class='alert alert-success'>Deleted successfully</div>";
        }else{
            echo "<div class='alert alert-danger'>Error deleting</div>";
        }
    }

}

?>
</tbody>
</table>
</div>
</div>
</div>