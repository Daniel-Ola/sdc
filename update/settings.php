<?php
session_start() ;
require_once("dbconnect.php") ;
require_once("dbfunctions.php") ;
require_once("config.php") ;
require_once("actionmanager.php") ;

if(!isset($_SESSION['user_id']))
{
	redirect("login.php") ;
}
else
{
	function userDet()
	{
		$id = $_SESSION['user_id'] ;
		$connect = dbconnect() ;
		$access_name = getAccess($_SESSION['access_id']) ;
		/*if($_SESSION['access_id'] == 1)
		{
			$access_name = "Courtsey Officer" ;
		}
		if($_SESSION['access_id'] == 2)
		{
			$access_name = "Dean" ;
		}
		if($_SESSION['access_id'] == 3)
		{
			$access_name = "Disciplinary unit staff" ;
		}*/
		$query = mysqli_query($connect , "SELECT * FROM users WHERE user_id = '$id' ") ;
		if($query)
		{
			$fetch = mysqli_fetch_assoc($query) ;
			$email = $fetch['email'] ;
		}
		$details = array('user_id' => $_SESSION['user_id'] , 'fullname' => $_SESSION['fullname'] , 'access_id' => $_SESSION['access_id'] , 'email' => $email , 'access_name' => $access_name);
		return  $details ;
	}

	function user0($id)
	{
		if($id != 0)
		{
		    redirect("login.php") ;
		}
	}

	function user1($id)
	{
		if($id != 1)
		{
		    redirect("login.php") ;
		}
	}

	function user2($id)
	{
		if($id != 2)
		{
		    redirect("login.php") ;
		}
	}

	function user3($id)
	{
		if($id != 3)
		{
		    redirect("login.php") ;
		}
	}

	function staffDet()
	{
		if(isset($_GET['s']))
		{
			$sid = $_GET['s'] ;
			$connect = dbconnect() ;
			$dataRead = new DataRead() ;
			$query = $dataRead->getuser($connect , $sid) ;
			if($query)
			{
				return $query ;
			}
		}
		else
		{
			$user = userDet() ;
			if($user['access_id'] == 3)
			{
				redirect("searchstaff.php") ;
			}
		}
	}

	function getAccess($akses)
	{
		switch ($akses) {
			case 0:
				$return = "Admin" ;
				break;
			case 1:
				$return = "Courtesy Officer" ;
				break;
			case 2:
				$return = "Dean" ;
				break;
			case 3:
				$return = "Disciplinary unit staff" ;
				break;
			default:
				$return = "Nill" ;
				break;
		}
		return $return ;
	}

	function getPunishment($punish)
	{
		switch ($punish) {
			case 0:
				$return = "No punishment was attached to this case" ;
				break;
			case 1:
				$return = "Warning" ;
				break;
			case 5:
				$return = "Expulsion" ;
				break;
			case 21:
				$return = "One week councelling" ;
				break;
			case 22:
				$return = "Two weeks councelling" ;
				break;
			case 23:
				$return = "Three weeks councelling" ;
				break;
			case 24:
				$return = "Four weeks councelling" ;
				break;
			case 25:
				$return = "Five weeks councelling" ;
				break;
			case 26:
				$return = "Six weeks councelling" ;
				break;
			case 27:
				$return = "As advised by the councellor" ;
				break;
			case 31:
				$return = "One week suspension" ;
				break;
			case 32:
				$return = "Two weeks suspension" ;
				break;
			case 33:
				$return = "Suspended for one semester" ;
				break;
			case 34:
				$return = "Suspended for two semesters" ;
				break;
			case 41:
				$return = "Rusticated for one semester" ;
				break;
			case 42:
				$return = "Rusticated for two semesters" ;
				break;
			default:
				$return = "No punishment is attached to this case yet" ;
				break;
		}
		return $return ;
	}

	function sideBar($bar)
	{
		switch ($bar) {
			case 0:
				$return = "sidebar0.php" ;
				break;
			case 1:
				$return = "sidebar1.php" ;
				break;
			case 2:
				$return = "sidebar2.php" ;
				break;
			case 3:
				$return = "sidebar3.php" ;
				break;
			default:
				$return = "Nill" ;
				break;
		}
		return $return ;
	}

	function urltxtmix($val)
	{
		$time = time() ;
		$time = md5($time) ;
		$time2 = time() + 360 ;
		$time2 = md5($time2) ;
		$return = $time.$val.$time2 ;
		return $return ;
	}

	function  viewCase()
	{
		if(isset($_GET['p']))
		{
			$dataRead = new DataRead() ;
			$connect = dbconnect() ;
			$id = $_GET['p'] ;
			$query = $dataRead->viewcase($connect , $id) ;
			if($query)
			{
				return $query ;
			}
		}
		else
		{
			$user = userDet() ;
			if($user['access_id'] == 1)
			{
				redirect("searchcase.php") ;
			}
			else
			{
				redirect("viewrecords.php") ;
			}
		}
	}

	function viewPunish($id)
	{
			$dataRead = new DataRead() ;
			$connect = dbconnect() ;
			$query = $dataRead->viewpunish($connect , $id) ;
			if($query)
			{
				return $query ;
			}
	}

	function casestatus()
	{
		if(isset($_GET['p']))
		{
			$dataRead = new DataRead() ;
			$connect = dbconnect() ;
			$id = $_GET['p'] ;
			$query = $dataRead->viewcase($connect , $id) ;
			if($query)
			{
				$stat = $query['status'] ;
				if($stat == 0)
				{
					$return = "<i class='text-warning'>Pending</i>" ;
					return $return ;
				}
				if($stat == 1)
				{
					$return = "<i class='text-success'>Approved</p>" ;
					return $return ;
				}
				if($stat == 3)
				{
					$return = "<i class='text-primary'>Punished</p>" ;
					return $return ;
				}
				if($stat == 4)
				{
					$return = "<i class='text-danger'>Declined</p>" ;
					return $return ;
				}
			}
		}
	}

	function casestat($stat)
	{
		if($stat == 0)
		{
			$return = "<i class='text-warning'>Pending</i>" ;
			return $return ;
		}
		if($stat == 1)
		{
			$return = "<i class='text-success'>Approved</p>" ;
			return $return ;
		}
		if($stat == 3)
		{
			$return = "<i class='text-primary'>Punished</p>" ;
			return $return ;
		}
		if($stat == 4)
		{
			$return = "<i class='text-danger'>Declined</p>" ;
			return $return ;
		}
	}

	function getusername($user_id)
	{
		$dataRead = new DataRead() ;
		$connect = dbconnect() ;
		$query = $dataRead->getuser($connect , $user_id) ;
		if($query)
		{
			$name = $query['fullname'] ;
			return $name ;
		}
	}
}



?>