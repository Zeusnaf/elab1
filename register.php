<?php include 'header.php' ?>
<div class="container">
<div class="col-sm-4"></div>
<div class="col-sm-4 thumbnail">

<div class="modal-header" style="background:#1e90ff;color:white;text-align:center">
<h5><i class="fa fa-user" style="font-size:25px;text-align:left"></i>&nbsp;&nbsp;Register</h5>
</div>
<div class="modal-body">
<form action="register.php" method="POST" class="form-horizontal">
<div class="form-group">
<label for="firstname" class="form-label">Firstname</label>
<input type="text" name="firstname" id="firstname" class="form-control">
</div>
<div class="form-group">
<label for="lastname" class="form-label">Lastname</label>
<input type="text" name="lastname" id="lastname" class="form-control">
</div>
<div class="form-group">
<label for="pfnumber" class="form-label">PfNumber</label>
<input type="text" name="pfnumber" id="pfnumber" class="form-control">
</div>
<div class="form-group">
<label for="category" class="form-label">Category</label>
<select name="category" id="category" class="form-control">
<option value="labtechnician">Lab Tech</option>
<option value="secretary">secretary</option>
</select>
</div>
<div class="row">
<div class="col-sm-5">
<div class="form-group">
<label for="username" class="form-label">Username</label>
<input type="text" name="username" id="username" class="form-control">
</div>
</div>
<div class="col-sm-2"></div>
<div class="col-sm-5">
<div class="form-group">
<label for="password" class="form-label">Password</label>
<input type="password" name="password" id="password" class="form-control">
</div>
</div>
</div>



<button type="submit" class="btn btn-default btn-block" style="background:#1e90ff;color:white;text-align:center" name="register"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Register</button>

</form>
<?php
if(isset($_POST['register'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $pfnumber=$_POST['pfnumber'];
    $category=$_POST['category'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hpass=md5($password);
    $stat="pending";

    $query="INSERT INTO users(firstname,lastname,username,password,pf_number,user_type,status)VALUES(?,?,?,?,?,?,?)";
    $insert=$connect->prepare($query);
    $insert->bind_param('sssssss',$firstname,$lastname,$username,$hpass,$pfnumber,$category,$stat);
    if($insert->execute()){
        echo "<div class='alert alert-success'>Inserted successfully</div>";
    }else{
        echo "<div class='alert alert-danger'>Error occured</div>";
    }
}
?>

</div>

</div>
<div class="col-sm-4"></div>
</div>

<?php include 'footer.php' ?>