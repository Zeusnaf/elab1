<div class="well" style="background:white;margin-left:10px">
<span style="text-align:center"><h3>Add Administrators</h3></span>
<hr>
<?php
if(isset($_POST['addadmin'])){
    $afirstname=$_POST['afirstname'];
    $alastname=$_POST['alastname'];
    $apfnumber=$_POST['apfnumber'];
    $acategory="admin";
    $active="active";
    $ausername=$_POST['ausername'];
    $apassword=$_POST['apassword'];
    $query="INSERT INTO users(firstname,lastname,username,password,pf_number,user_type,status)VALUES(?,?,?,?,?,?,?)";
    $insert=$connect->prepare($query); 
    $insert->bind_param('sssssss',$afirstname,$alastname,$ausername,$apassword,$apfnumber,$acategory,$active);
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
<label for="firstname" class="form-label">firstname</label>
<input type="text" name="afirstname" id="afirstname" class="form-control">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="lastname" class="form-label">Lastname</label>
<input type="text" name="alastname" id="alastname" class="form-control">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="pfNumber" class="form-label">pfNumber</label>
<input type="text" name="apfnumber" id="apfnumber" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="form-group">
<label for="username" class="form-label">Username</label>
<input type="text" name="ausername" id="ausername" class="form-control">
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="password" class="form-label">Password</label>
<input type="text" name="apassword" id="apassword" class="form-control">
</div>
</div>
<div class="col-sm-4">

</div>
</div>

<div class="form-group" style="padding-bottom:10px">
<button type="submit" class="btn btn-success pull-right" name="addadmin">Add</button>
</div>


</form>
</div>