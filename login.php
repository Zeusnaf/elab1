<?php include 'header.php' ?>
<div class="container" img src="img/beach7.jpg"  style="height:450px">
<div class="row" style="padding-top:20px">
<div class="col-sm-4"></div>
<div class="col-sm-4 thumbnail">

<div class="modal-header" style="background:#1e90ff;color:white;text-align:center">
<h5><i class="fa fa-sign-in" style="font-size:25px;text-align:left"></i>&nbsp;&nbsp;Login</h5>
</div>
<div class="modal-body">
<form action="login.php" method="POST" class="form-horizontal">
<div class="form-group">
<label for="category" class="form-label">Category</label>
<select name="category" id="category" class="form-control">
<option value="admin">Administrator</option>
<option value="labtechnician">Lab Tech</option>
<option value="secretary">secretary</option>
</select>
</div>
<div class="form-group">
<label for="username" class="form-label">Username</label>
<input type="text" name="username" id="username" class="form-control">
</div>
<div class="form-group">
<label for="password" class="form-label">Password</label>
<input type="password" name="password" id="password" class="form-control">
</div>
<button type="submit" class="btn btn-default btn-block" style="background:#1e90ff;color:white;text-align:center" name="login"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</button>
</form>
<?php
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $hpass=md5($password);
    $category=$_POST['category'];
    if($category=="labtechnician"){
        $sel="SELECT * FROM users WHERE user_type='labtechnician'AND username='$username' AND password='$hpass' AND status='active'";
        $select=$connect->query($sel);
        $count=$select->num_rows;

        if($count==1){
            echo "<script>window.location.href='success_lab.php'</script>";
            $_SESSION['user']=$username;

        }else{
            echo "<div class='alert alert-danger'>Wrong username or password or account not approved</div>";
        }
    }elseif($category=="secretary"){
        $sel="SELECT * FROM users WHERE user_type='secretary' AND username='$username' AND password='$hpass' AND status='active'";
        $select=$connect->query($sel);
        $count=$select->num_rows;

        if($count==1){
            echo "<script>window.location.href='success_sec.php'</script>";
            $_SESSION['user']=$username;

        }else{
            echo "<div class='alert alert-danger'>Wrong username or password or account not approved</div>";
        }
    }elseif($category=="admin"){
        $sel="SELECT * FROM users WHERE user_type='admin'AND username='$username' AND password='$password'";
        $select=$connect->query($sel);
        $count=$select->num_rows;

        if($count==1){
            echo "<script>window.location.href='success_admin.php'</script>";
            $_SESSION['user']=$username;

        }else{
            echo "<div class='alert alert-danger'>Wrong username or password or account not approved</div>";
        }
    }
   
}
?>
</div>

</div>
<div class="col-sm-4"></div>
</div>

</div>


<?php include 'footer.php' ?>