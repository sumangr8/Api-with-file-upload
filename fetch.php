<?php
header("Content-Type:application/json");
include("db.php");
if(isset($_GET["id"]))
{
	$id=$_REQUEST["id"];
	$sql="select * from login where id='$id'";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
	echo json_encode(array("status"=>1,"message"=>"record found","data"=>$row));
}
else
{
	$sql="select * from login";
	$result=$con->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc())
		{
			$arr[]=$row;
		}
		echo json_encode(array("status"=>1,"message"=>"Record Found","data"=>$arr));
	}
	else
	{
		echo json_encode(array("status"=>0,"message"=>"Not Found"));
	}
}
?>