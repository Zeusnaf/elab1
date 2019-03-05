<?php
$host="localhost";
$user="root";
$pass="";
$db="elab";
$connect=new mysqli($host,$user,$pass,$db);
if($connect->connect_error){
die('error occured');
}else{
   
}

?>