<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>Add Equipments</h3></span>
<hr>
<?php
if(isset($_POST['addequip'])){
    $ename=$_POST['ename'];
    $etype=$_POST['etype'];
    $quantity=$_POST['quantity'];
    
    $units=$_POST['units'];
    $seller=$_POST['seller'];
    date_default_timezone_set("Africa/Nairobi");
    $date=date("Y-M-d");
    $status="in stock";
    $query="INSERT INTO equipments(ename,etype,quantity,units,seller,date,status)VALUES(?,?,?,?,?,?,?)";
    $insert=$connect->prepare($query); 
    $insert->bind_param('sssssss',$ename,$etype,$quantity,$units,$seller,$date,$status);
    if($insert->execute()){
        echo "<div class='alert alert-success'>Inserted successfully</div>";
    }else{
        echo "<div class='alert alert-danger'>Error occured</div>";
    }
}

?>
<form action="" method="POST">
<div class="row" >
<div class="col-sm-4">
<div class="form-group">
<label for="ename" class="form-label">Equipment Name</label>
<input type="text" name="ename" class="form-control">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="etype" class="form-label">Type</label>
<select name="etype" id="" class="form-control">
<option value="apparatus">Apparatus</option>
<option value="chemicals">Chemicals</option>
</select>
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="quantity" class="form-label">quantity</label>
<input type="number" name="quantity" class="form-control" placeholder="eg 3">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="units" class="form-label">Units</label>
<select name="units" id="" class="form-control">
<option value="kgs">Kgs</option>
<option value="gs">gs</option>
<option value="pieces">pieces/items</option>
<option value="pieces">ml</option>
</select>

</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="seller" class="form-label">Seller</label>
<input type="text" name="seller" class="form-control">
</div>
</div>
<div class="col-sm-4">

</div>
</div>

<div class="form-group" style="padding-bottom:10px">
<button type="submit" class="btn btn-success pull-right" name="addequip">Add</button>
</div>


</form>
</div>