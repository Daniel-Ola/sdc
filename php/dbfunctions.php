<?php
require_once("dbconnect.php") ;
// require_once("dbfunctions.php") ;
require_once("config.php") ;
require_once("actionmanager.php") ;

class DataWrite
{
	function bookstud($connect , $sname , $sid , $ctit , $user_id , $csesn , $csem , $filename , $filename2 , $pphone , $pmail , $pname)
	{
		$query = mysqli_query($connect , "INSERT INTO case_file (stud_name , stud_id , stud_pic , pname , pmail , pphone , case_title , case_stat , case_sesn , case_sem , creator) VALUES ('$sname' , '$sid' , '$filename2' , '$pname' , '$pmail' , '$pphone' , '$ctit' , '$filename' , '$csesn' , '$csem' , '$user_id') ") ;
		if($query)
		{
			$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Case has been added successfully</p></div>" ;
			return $return ;
		}
		else
		{
			$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i>".mysqli_error($connect)." Warning! Error adding case</p></div>" ;
			return $return ;
		}
	}

	function addstaff($connect , $sname , $smail , $password , $stafftype , $user_id)
	{
		$query = mysqli_query($connect , "INSERT INTO users (fullname , email , password , access_id , created_by) VALUES ('$sname' , '$smail' , '$password' , '$stafftype' , '$user_id') ") ;
		if($query)
		{
			$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>New staff added successfully, make sure to change your password on login</p></div>" ;
			return $return ;
		}
		else
		{
			$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Error adding staff</p></div>" ;
			return $return ;
		}
	}

	function changePwrd($connect , $cpwrd , $npwrd , $user_id)
	{
		$query = mysqli_query($connect , "SELECT * FROM users WHERE user_id = '$user_id' ") ;
		if($query && numQuery($query) == 1)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			$pass = $fetch['password'] ;
			if($cpwrd == $pass)
			{
				$query2 = mysqli_query($connect , "UPDATE users SET password = '$npwrd' WHERE user_id = '$user_id' ") ;
				if($query2)
				{
					$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Password has been changed successfully</p></div>" ;
					return $return ;
				}
				else
				{
					$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Error changing password</p></div>" ;
					return $return ;
				}
			}
			else
			{
				$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Incorrect current password</p></div>" ;
				return $return ;
			}
		}
		else
		{
			return "one" ; //mysqli_error($query) ;
		}
	}

	function punish($connect , $pstat , $user_id , $case_id)
	{
		// $dataRead = new DataRead()
		$query = mysqli_query($connect , "INSERT INTO punishments (case_id , user_id , punish) VALUES ('$case_id' , '$user_id' , '$pstat') ") ;
		if($query)
		{
			$query2 = mysqli_query($connect , "UPDATE case_file SET status = 3 WHERE case_id = '$case_id' ") ;
			$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Punishment added successfully</p></div>" ;
			return $return ;
		}
		else
		{
			$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Sorry an error occured</p></div>" ;
			return $return ;
		}

	}

	function approve($connect , $case_id)
	{
		$query = mysqli_query($connect , "UPDATE case_file SET status = 1 WHERE case_id = '$case_id' ") ;
		if($query)
		{
			$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Case approved successfully</p></div>" ;
			return $return ;
		}
		else
		{
			$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Sorry an error occured</p></div>" ;
			return $return ;
		}
	}

	function change_role($connect , $user_id , $role)
	{
		$query = mysqli_query($connect , "UPDATE users SET access_id = '$role' WHERE user_id = '$user_id' ") ;
		if($query)
		{
			$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Staff role updated successfully</p></div>".$role ;
			return $return ;
		}
		else
		{
			$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Sorry an error occured</p></div>" ;
			return $return ;
		}
	}

	function del_role($connect , $user_id)
	{
		$query = mysqli_query($connect , "DELETE FROM users WHERE user_id = '$user_id' ") ;
		if($query)
		{
			$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Staff deleted successfully</p></div>" ;
			return $return ;
		}
		else
		{
			$return = "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! Sorry an error occured</p></div>" ;
			return $return ;
		}
	}
}

class DataRead
{
	function searchcase($connect , $para , $valu)
	{
		if($valu != "")
		{
			$query = mysqli_query($connect , "SELECT * FROM case_file WHERE ".$para." LIKE '%".$valu."%' ") ;
			if($query)
			{
				$num = numQuery($query) ;
				if($num == 0)
				{
					$return = array('nill' => "No search result matches '".$valu."'");
					return $return ;
				}
				else
				{
					$fetch = mysqli_fetch_assoc($query) ;
					return $fetch;
				}
			}
		}
		else
		{
			$return = "" ;
			return $return ;
		}
	}

	function get_all_staffs()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM users") ;
		if($query)
		{
			// $fetch = mysqli_fetch_assoc($query) ;
			return $query ;
		}
		else
		{
			return mysqli_error($query) ;
		}
	}

	function get_all_case()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM case_file") ;
		if($query)
		{
			// $fetch = mysqli_fetch_assoc($query) ;
			return $query ;
		}
		else
		{
			return mysqli_error($query) ;
		}
	}

	function get_app_case()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM case_file WHERE status = 1 ") ;
		if($query)
		{
			// $fetch = mysqli_fetch_assoc($query) ;
			return $query ;
		}
		else
		{
			return mysqli_error($query) ;
		}
	}

	function get_unapp_case()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM case_file WHERE status = 0 ") ;
		if($query)
		{
			// $fetch = mysqli_fetch_assoc($query) ;
			return $query ;
		}
		else
		{
			return mysqli_error($query) ;
		}
	}/*

	function get_topun()
	{
		$connect = dbconnect() ;
		$query = mysqli_query($connect , "SELECT * FROM case_file WHERE status = 1 ") ;
		if($query)
		{
			// $fetch = mysqli_fetch_assoc($query) ;
			return $query ;
		}
		else
		{
			return mysqli_error($query) ;
		}
	}*/

	function viewcase($connect , $id)
	{
		$query = mysqli_query($connect , "SELECT * FROM case_file WHERE case_id = '$id' ") ;
		$num = numQuery($query) ;
		if($num == 1)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			return $fetch ;
		}
	}

	function viewpunish($connect , $id)
	{
		$query = mysqli_query($connect , "SELECT * FROM punishments WHERE case_id = '$id' ") ;
		$num = numQuery($query) ;
		if($num != 0)
		{
			$offset = $num - 1 ;
			$query2 = mysqli_query($connect , "SELECT * FROM punishments WHERE case_id = '$id' LIMIT 1 OFFSET $offset ") ;
			if($query2)
			{
				$fetch = mysqli_fetch_assoc($query2) ;
				return $fetch ;
			}
			else
			{
				return $arrayName = array('punish' => mysqli_error($query2));
			}
		}
		else
		{
			return $arrayName = array('punish' => 100);
		}
	}

	function getuser($connect , $user_id)
	{
		$query = mysqli_query($connect , "SELECT * FROM users WHERE user_id = '$user_id' ") ;
		if($query)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			return $fetch ;
		}
	}

	/*function get_staff($connect , $sid)
	{
		$query
	}*/
}
?>