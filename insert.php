<?php
header('Content-Type:application/json');
// header('Access-Control-Allow-Origin : *');
include("db.php");
$data=json_decode(file_get_contents("php://input"),true);
$name=$data["name"];
$email=$data["email"];
$password=$data["password"];
$qry=mysqli_query($con,"insert into login (name,email,password) values ('$name','$email','$password')");
if($qry)
{
	echo json_encode(array("message"=>"Insert success","status"=>true));
}
else
{
	echo json_encode(array("message"=>"Insert faield","status"=>false));
}
?>
