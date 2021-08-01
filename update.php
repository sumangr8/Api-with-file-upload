<?php
header("Content-Type:application/json");
include("db.php");
$data=json_decode(file_get_contents("php://input"));
$id=$data->id;
$name=$data->name;
$email=$data->email;
$mobile=$data->mobile;
$qualification=implode(",", $data->qualification);
$sql="update login set name='$name',email='$email',mobile='$mobile',qualification='$qualification' where id='$id'";
$result=$con->query($sql);
if($result)
{
	echo json_encode(array("status"=>1,"message"=>"Record Update"));
}
else
{
	echo json_encode(array("status"=>0,"message"=>"Not Update"));
}
?>