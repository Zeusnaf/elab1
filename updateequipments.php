<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>Update used solutions</h3></span>
<hr>
<?php
include 'connect.php';
if(isset($_POST['updateequip'])){
    

    foreach($_POST['eid'] as $eid){
        $qua=$_POST['quantity'];
        $comments=$_POST['comments'];
        $sele="SELECT * FROM equipments WHERE e_id='$eid'";
        $q=$connect->query($sele);
        while($fetch=$q->fetch_object()){
            $quantity=$fetch->quantity;
            $remaining=$fetch->remaining;
            $new=$quantity-$qua;
            
            if($remaining==''){
                if($quantity<$qua){
                    echo "<div class='alert alert-danger'>Error Stock available is $quantity</div>"; 
                }else{
                      
                        $insert="INSERT INTO used(e_id,quantity,quantity_used,remaining)VALUES(?,?,?,?)";
                        $in=$connect->prepare($insert);
                        $in->bind_param('ssss',$eid,$quantity,$qua,$new);
                        $in->execute();
                    
                    
                   
                    $update="UPDATE equipments SET remaining='$new'  WHERE e_id='$eid'";
                    $quer=$connect->query($update);
                    if($quer){
                        echo "<div class='alert alert-success'>Updated successfully</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Error updating</div>";
                    }
                }
                

            }else{
                if($remaining<$qua){
                    echo "<div class='alert alert-danger'>Error Stock available is $remaining</div>"; 
                }else{
                    $new=$remaining-$qua;
                   
                    
                        $insert="INSERT INTO used(e_id,quantity,quantity_used,remaining)VALUES(?,?,?,?)";
                        $in=$connect->prepare($insert);
                        $in->bind_param('ssss',$eid,$quantity,$qua,$new);
                        $in->execute();
                    
                    $update="UPDATE equipments SET remaining='$new'  WHERE e_id='$eid'";
                    $quer=$connect->query($update);
                    if($quer){
                        echo "<div class='alert alert-success'>Updated successfully</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Error updating</div>";
                    }
                }
            }
           
        }
           
        
        
    }



   
}

?>
<form action="" method="POST">
<div class="row" >
<div class="col-sm-4">
<form method='POST' action=''>
<div class="form-group">
<label for="ename" class="form-label">Solution Name</label>
<select name="eid[]" id="" class="form-control">

<?php
//fetching array
$select="SELECT * FROM equipments WHERE etype='chemicals'";
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
    
    echo " 
   
   
  
    <option value='$eid'>$ename</option>
    "
    ;
   //action
      
    
    
    
    
}
echo "
</select>";


?>
</div>
</div>
<div class="col-sm-4" >
<div class="form-group">
<label for="etype" class="form-label">Type</label>
<select name="etype" id="" class="form-control">

<option value="chemicals">Chemicals</option>
</select>
</div>
</div>
<div class="col-sm-4" >
<div class="form-group">
<label for="quantity" class="form-label">Enter quantity</label>
<input type="number" name="quantity" class="form-control" placeholder="eg 3">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="units" class="form-label">Comments</label>
<select name="comments" id="" class="form-control">

<option value="used">Used</option>

</select>

</div>
</div>
<div class="col-sm-4">

</div>
<div class="col-sm-4">

</div>
</div>

<div class="form-group" style="padding-bottom:10px">
<button type="submit" class="btn btn-success pull-right" name="updateequip">Update</button>
</div>


</form>
</div>
<div class="panel-group"id="accordion">
				<div class="panel">
					
						<button class="btn btn-sm btn-primary" href="#section1"data-parent="#accordion"data-toggle="collapse">view all</button>
					
					<div class="panel-body collapse panel-collapse"id="section1">
						<table class="table table-hover table-striped table-condensed" id="tableprint">
						<thead>
						<tr>
							<th>equipement_id</th>
							<th>quantity</th>
							<th>Quantity Used</th>
							<th>Quantity Remaining</th>
							
							
							</tr>
						</thead>
						<tbody>
						<?php
					$select="SELECT * FROM used";
						$que=$connect->query($select);
						while($data=$que->fetch_object()){
							$id=$data->id;
                            $eid=$data->e_id;
                            $se="SELECT * FROM equipments WHERE e_id='$eid'";
                            $qq=$connect->query($se);
                            $fetch=$qq->fetch_object();
                            $tyyp=$fetch->etype;
							
							
                            $quantity=$data->quantity;
                            $quantity_r=$data->remaining;
							
							
							echo "
							
							<tr>
						
							<td>$id</td>
							<td>$tyyp</td>
							<td>$quantity</td>
							<td>$quantity_remaining</td>
							
							
							
							";
						
							
							
							
							
						} ?>
						</tbody>
                        <a href='print_usedsolution.php' class="btn btn-success pull-right">Print</a>
							 <!--<button type="button" class="btn btn-success pull-right" id="print" value="statement">print</button>-->
							 </table>
						
					</div><!--End of panel body-->
				</div><!--End of panel-->
				
			</div><!--End of panel group-->
</div>
