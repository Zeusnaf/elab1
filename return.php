<ul class="nav nav-tabs pull-right" style="padding:10px">
<li><a href="success_lab.php?borrow" style="background:#1e90ff;color:white">Borrow</a></li>
<li><a href="success_lab.php?return">Return</a></li>
</ul>

<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>Return Equipments</h3></span>
<hr>
<form action="" method="post" class="form-vertical">
<div class="form-group">
<input type="text" name="serch" id="serch" class="form-control" style="width:30%"><button type="submit" name="serchbtn" class="btn btn-primary">Search</button>

</div>
</form>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Product_id</th>
<th>Type</th>
<th>Quantity</th>
<th>Issued to</th>
<th>Date Borrowed</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php
if(isset($_POST['serchbtn'])){
    $serch=$_POST['serch']; 
    $select="SELECT * FROM borrowed_equip  WHERE status !='returned' AND description LIKE '%$serch%'";
    $que=$connect->query($select);
    while($data=$que->fetch_object()){
        $bid=$data->b_id;
        $pid=$data->product_id;
        $type=$data->type;
        
        $quantity=$data->quantity;
        $desc=$data->description;
        $date=$data->date_time_borrowed;
        
        
        echo "
        
        <tr>
    
        <td>$pid</td>
        <td>$type</td>
        <td>$quantity</td>
        <td>$desc</td>
        <td>$date</td>
        <td><a href='success_lab.php?bid=$bid' class='btn btn-success'>Mark returned</a></td>
        
        ";
       
        
        
        
        
    } 

}else{
    $select="SELECT * FROM borrowed_equip  WHERE status !='returned'";
    $que=$connect->query($select);
    while($data=$que->fetch_object()){
        $bid=$data->b_id;
        $pid=$data->product_id;
        $type=$data->type;
        
        $quantity=$data->quantity;
        $desc=$data->description;
        $date=$data->date_time_borrowed;
        
        
        echo "
        
        <tr>
    
        <td>$pid</td>
        <td>$type</td>
        <td>$quantity</td>
        <td>$desc</td>
        <td>$date</td>
        <td><a href='success_lab.php?bid=$bid' class='btn btn-success'>Mark returned</a></td>
        
        ";
       
        
        
        
        
    } 
}



?>
</tbody>
</table>
</div>
<div class="panel-group"id="accordion">
				<div class="panel">
					
						<button class="btn btn-sm btn-primary" href="#section1"data-parent="#accordion"data-toggle="collapse">view all</button>
					
					<div class="panel-body collapse panel-collapse"id="section1">
						<table class="table table-bordered table-hover table-striped table-condensed" id="tableprint">
						<thead>
						<tr>
                        <th>Product_id</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Issued to</th>
                        <th>Date Borrowed</th>
                        <th>status</th>
							</tr>
						</thead>
						<tbody>
                        <?php
$select="SELECT * FROM borrowed_equip  WHERE status ='returned'";
    $que=$connect->query($select);
    while($data=$que->fetch_object()){
        $bid=$data->b_id;
        $pid=$data->product_id;
        $type=$data->type;
        
        $quantity=$data->quantity;
        $desc=$data->description;
        $date=$data->date_time_returned;
        $status=$data->status;
        
        
        echo "
        
        <tr>
    
        <td>$pid</td>
        <td>$type</td>
        <td>$quantity</td>
        <td>$desc</td>
        <td>$date</td>
        <td>$status</td>
        
        ";
       
        
        
        
        
    } ?>
						</tbody>
                        <a href='print_pdf.php' class="btn btn-success pull-right">Print</a>
							 <!-- <button type="button" id="print" class="btn btn-success pull-right">print</button> -->
							 </table>
						
					</div><!--End of panel body-->
				</div><!--End of panel-->
				
			</div><!--End of panel group-->
</div>
