<?php
header("Content-Type:application/json");
include("db.php");
$token_password="theequicomgr8";
$tsql="select * from token where token_password='$token_password'";
$tresult=$con->query($tsql);
if($tresult->num_rows > 0)
{
	$data=json_decode(file_get_contents("php://input"));
	$email=$data->email;
	$password=$data->password;
	$sql="select * from login where email='$email'";
	$result=$con->query($sql);
	if($result->num_rows > 0)
	{
		$row=$result->fetch_assoc();
		if($row)
		{
			$verify=password_verify($password, $row["password"]);
			if($verify==1)
			{
				echo json_encode(array("status"=>1,"message"=>"Login Success"));
			}
		}
		else
		{
			echo json_encode(array("status"=>0,"message"=>"Invalid Password"));
		}
	}
	else
	{
		echo json_encode(array("status"=>0,"messsage"=>"Invalid UserName"));
	}
}
else
{
	echo json_encode(array("status"=>0,"message"=>"Invalid Authintication"));
}
?>