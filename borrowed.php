<ul class="nav nav-tabs pull-right" style="padding:10px">
<!--<li><a href="success_lab.php?borrow" style="background:#1e90ff;color:white">Borrow</a></li>-->
<li><a href="success_lab.php?return">Return</a></li>
</ul>

<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>Borrowed /Returned Equipments</h3></span>
<hr>
<?php
if(isset($_POST['updateborrowed'])){
    date_default_timezone_set("Africa/Nairobi");
    $date=date('Y-M-d : h:m:s');
    

    foreach($_POST['eidd'] as $eidd){
        $qua=$_POST['equantity'];
     
        $type=$_POST['eetype'];
        $borrower=$_POST['ecomments'];
        $desc=$_POST['edesc'];
        $sele="SELECT * FROM equipments WHERE e_id='$eidd'";
        $q=$connect->query($sele);
        while($fetch=$q->fetch_object()){
            $quantity=$fetch->quantity;
            $remaining=$fetch->remaining;
            
            if($remaining==''){
                if($quantity<$qua){
                    echo "<div class='alert alert-danger'>Error Stock available is $quantity</div>"; 
                }else{
                    $new=$quantity-$qua;

                    $update="UPDATE equipments SET remaining='$new'  WHERE e_id='$eidd'";
                    $quer=$connect->query($update);
                    
                    $insert="INSERT INTO borrowed_equip(product_id,type,quantity,borrower,description,date_time_borrowed)VALUES(?,?,?,?,?,?)";
                    $qqq=$connect->prepare($insert);
                    $qqq->bind_param('ssssss',$eidd,$type,$qua,$borrower,$desc,$date);
                    
                    if($quer && $qqq->execute()){
                        echo "<div class='alert alert-success'>Borrowed successfully</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Error borrowing</div>";
                    }
                }
                

            }else{
                if($remaining<$qua){
                    echo "<div class='alert alert-danger'>Error Stock available is $remaining</div>"; 
                }else{
                    $new=$remaining-$qua;
                    $update="UPDATE equipments SET remaining='$new'  WHERE e_id='$eidd'";
                    $quer=$connect->query($update);
                    $insert="INSERT INTO borrowed_equip(product_id,type,quantity,borrower,description,date_time_borrowed)VALUES(?,?,?,?,?,?)";
                    $qqq=$connect->prepare($insert);
                    $qqq->bind_param('ssssss',$eidd,$type,$qua,$borrower,$desc,$date);
                    
                    if($quer && $qqq->execute()){
                        echo "<div class='alert alert-success'>Borrowed successfully</div>";
                    }else{
                        echo "<div class='alert alert-danger'>Error borrowing</div>";
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
<select name="eidd[]" id="" class="form-control">

<?php
//fetching array
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
<select name="eetype" id="" class="form-control">
<option value="apparatus">Apparatus</option>
<option value="chemicals">Chemicals</option>
</select>
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="quantity" class="form-label">Enter quantity borrowed</label>
<input type="number" name="equantity" class="form-control" placeholder="eg 3">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="units" class="form-label">Group/student</label>
<select name="ecomments" id="" class="form-control">
<option value="individual">Individual</option>
<option value="group">Group</option>

</select>

</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="desc" class="form-label">Enter student/group details</label>
<input type="text" name="edesc" class="form-control" placeholder="description">
</div>
</div>
</div>
<div class="col-sm-4">

</div>


<div class="form-group" style="padding-bottom:10px">
<button type="submit" class="btn btn-success pull-right" name="updateborrowed">Update</button>
</div>
</div>

</form>
</div>