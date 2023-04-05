<?php

	session_start();
	
	session_destroy();
     echo "Successfully Logedout";
	header("location:login.php");
?>