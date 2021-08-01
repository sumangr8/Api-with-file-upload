<?php 
header("Content-Type: application/json");
$con=new mysqli("localhost","root","","signup");

$response=[];

if($con->connect_error)
{
	$response["MESSAGE"]="Connection Error";
	$response["STATUS"]=500;
}
else
{
	$data=json_decode(file_get_contents("php://input"),true);
	$name=$data["name"];
	$email=$data["email"];
	$password=$data["password"];
	$qualification=implode(",", $data["qualification"]);
	if($name!="" && $email!="" && $password!="")
	{
		$sql="insert into login(name,email,password,qualification) values('$name','$email','$password','$qualification')";
		if($con->query($sql))
		{
			$response["MESSAGE"]="insert Success";
			$response["STATUS"]=200;
		}
		else
		{
			$response["MESSAGE"]="insert Faield";
			$response["STATUS"]=500;
		}
	}
	else
	{
		$response["MESSAGE"]="Every Field Required";
		$response["STATUS"]=400;
	}
}
echo json_encode($response);
?>
