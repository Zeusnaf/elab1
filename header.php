<?php
require 'connect.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ELab</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="csss/font-awesome.min.css">
    <style>
    
    body{
        background:#cccccc;
    }
    .orange{
    color:rgb(255, 88, 33);
}
.bgorange{
    background:rgb(255, 88, 33);
}
    </style>
</head>
<body>
<div class="container-fluid">
<div class="navbar navbar-default" style="background:#1e90ff">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsebar">
<span class="icon-bar" style="color:#333"></span>
<span class="icon-bar" style="color:#333"></span>
<span class="icon-bar" style="color:#333"></span>
</button>
<div class="collapse navbar-collapse" id="collapsebar">
<ul class="nav navbar-nav" style="padding:15px">
<li><a href="#" class="hover" style="color:white"><i class="fa fa-home"></i>&nbsp;&nbsp;HOME</a></li>
<li><a href="#" class="hover" style="color:white"><i class="fa fa-book"></i>&nbsp;&nbsp;ABOUT US</a></li>
<li><a href="#" class="hover"style="color:white"><i class="fa fa-file"></i>&nbsp;&nbsp;GALLERY</a></li>
<li><a href="#" class="hover" style="color:white"><i class="fa fa-phone"></i>&nbsp;&nbsp;CONTACT US</a></li>

<li class="dropdown"><a href="#" data-toggle="dropdown" class="hover" style="color:white"><i class="fa fa-user"></i>&nbsp;&nbsp;ACCOUNT&nbsp;<i class="caret"></i></a>
<ul class="dropdown-menu">
<?php
if(!isset($_SESSION['user'])){
    echo '<li><a href="register.php"  style="color:#1e90ff"><i class="fa fa-edit"></i>&nbsp;&nbsp;REGISTER</a></li>
    <li><a href="login.php"   style="color:#1e90ff"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;LOGIN</a></li>';
}else{
    $user=$_SESSION['user'];
    echo '<li><a href="#" class="hover" style="color:#1e90ff"><i class="fa fa-user"></i>&nbsp;&nbsp;'.$user.'</a></li>
    <li><a href="logout.php"   class="hover" style="color:#1e90ff"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;LOGOUT</a></li>';
}
?>


    


</ul>
</li>
</ul>
</div>
</div>