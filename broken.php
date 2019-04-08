<div class="well">
<?php
if(isset($_POST['updatebroken'])){
    date_default_timezone_set("Africa/Nairobi");
    $date=date('Y-M-d : h:m:s');
    

    foreach($_POST['bid'] as $bidd){
        $qua=$_POST['bquantity'];
     
        $type=$_POST['btype'];
        $borrower=$_POST['bcomments'];
        $desc=$_POST['bdesc'];
        $sele="SELECT * FROM equipments WHERE e_id='$bidd'";
        $q=$connect->query($sele);
        while($fetch=$q->fetch_object()){
            $quantity=$fetch->quantity;
            $remaining=$fetch->remaining;
            
            if($remaining==''){
                if($quantity<$qua){
                    echo "<div class='alert alert-danger'>Error Stock available is $quantity</div>"; 
                }else{
                    $new=$quantity-$qua;

                    $update="UPDATE equipments SET remaining='$new'  WHERE e_id='$bidd'";
                    $quer=$connect->query($update);
                    
                    $insert="INSERT INTO broken(product_id,type,quantity,broken_by,description,date_time_broken)VALUES(?,?,?,?,?,?)";
                    $qqq=$connect->prepare($insert);
                    $qqq->bind_param('ssssss',$bidd,$type,$qua,$borrower,$desc,$date);
                    
                    if($quer && $qqq->execute()){
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
                    $update="UPDATE equipments SET remaining='$new'  WHERE e_id='$bidd'";
                    $quer=$connect->query($update);
                    $insert="INSERT INTO broken(product_id,type,quantity,broken_by,description,date_time_broken)VALUES(?,?,?,?,?,?)";
                    $qqq=$connect->prepare($insert);
                    $qqq->bind_param('ssssss',$bidd,$type,$qua,$borrower,$desc,$date);
                    
                    if($quer && $qqq->execute()){
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
<label for="ename" class="form-label">Equipment Name</label>
<select name="bid[]" id="" class="form-control">

<?php
//fetching array
$select="SELECT * FROM equipments WHERE etype='apparatus'";
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
<div class="col-sm-4">
<div class="form-group">
<label for="etype" class="form-label">Type</label>
<select name="btype" id="" class="form-control">
<option value="apparatus">Apparatus</option>

</select>
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="quantity" class="form-label">Enter number broken</label>
<input type="number" name="bquantity" class="form-control" placeholder="eg 3">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="units" class="form-label">Group/student</label>
<select name="bcomments" id="" class="form-control">
<option value="individual">Individual</option>
<option value="group">Group</option>

</select>

</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="desc" class="form-label">Enter student/group details</label>
<input type="text" name="bdesc" class="form-control" placeholder="description">
</div>
</div>
</div>
<div class="col-sm-4">

</div>


<div class="form-group" style="padding-bottom:10px">
<button type="submit" class="btn btn-success pull-right" name="updatebroken">Update</button>
</div>
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
							<th>Product_id</th>
							<th>Type</th>
							<th>Quantity</th>
							<th>Broken By</th>
							<th>Description</th>
							
							<th>Date Broken</th>
							
							</tr>
						</thead>
						<tbody>
											<?php
					$select="SELECT * FROM broken";
						$que=$connect->query($select);
						while($data=$que->fetch_object()){
							$bid=$data->b_id;
							$pid=$data->product_id;
							$type=$data->type;
							
							$quantity=$data->quantity;
							$desc=$data->description;
							$date=$data->date_time_broken;
							$broken_by=$data->broken_by;
							
							
							echo "
							
							<tr>
						
							<td>$pid</td>
							<td>$type</td>
							<td>$quantity</td>
							<td>$broken_by</td>
							<td>$desc</td>
							<td>$date</td>
							
							
							";
						
							
							
							
							
						} ?>
						</tbody>
                        <a href='print_broken.php' class="btn btn-success pull-right">Print</a>
							 <!--<button type="button" class="btn btn-success pull-right" id="print" value="statement">print</button>-->
							 </table>
						
					</div><!--End of panel body-->
				</div><!--End of panel-->
				
			</div><!--End of panel group-->
</div>
