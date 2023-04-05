<?php 
	include "common/dbc.php";
	echo $uid=$_REQUEST['uid'];
	
	$delete=mysql_query("delete from user where uid='$uid'");
	if($delete)
	{
		echo "deleted";
		header("location:users.php");
	}
	else
	{
		echo "failure";
	}
	?>
	
		