<?php
// header("Content-Type: application/json");
$con=new mysqli("localhost","root","","signup");

$response=[];
if($con->connect_error)
{
	$response["MESSAGE"]="Connection Error";
	$response["STATUS"]=500;
}
else
{
	if(is_uploaded_file($_FILES["pic"]["tmp_name"]) && $_POST["name"])
	{
		$name=$_POST["name"];

		$tmp_file=$_FILES["pic"]["tmp_name"];
		$image_name=$_FILES["pic"]["name"];
		$upload_dir="./img/".$image_name;

		$sql="insert into login(name,pic) values('$name','$image_name')";
		if(move_uploaded_file($tmp_file,$upload_dir) && $con->query($sql))
		{
			$response["MESSAGE"]="Upload Succed";
			$response["STATUS"]=200;
		}
		else
		{
			$response["MESSAGE"]="Upload faield";
			$response["STATUS"]=404;
		}
	}
	else
	{
		$response["MESSAGE"]="Invalid Request";
		$response["STATUS"]=400;
	}
}
echo json_encode($response);
?>