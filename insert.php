<?php

header("Content-Type: application/json");
// header("Acess-Control-Allow-Origin: *");
// header("Acess-Control-Allow-Methods: POST");
// header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include "db.php";
$data=json_decode(file_get_contents("php://input"),true);
$name=$data["name"];
$email=$data["email"];
$password=$data["password"];
$mobile=$data["mobile"];
$qualification=implode(",", $data["qualification"]);
$sql="insert into login (name,email,password,mobile,qualification) values('$name','$email','$password','$mobile','$qualification')";
$result=$con->query($sql);
if($result==1)
{
	echo json_encode(array("status"=>1,"message"=>"Insert Success"));
}
else
{
	echo json_encode(array("status"=>0,"message"=>"Insert Faield"));
}
?>

