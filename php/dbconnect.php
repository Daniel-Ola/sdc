<?php

function dbconnect()
{
	$connect = mysqli_connect("localhost" , "root" , "" , "sdc");
	if($connect)
	{
		return  $connect;
	}
}

?>