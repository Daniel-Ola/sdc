<?php
require_once("dbconnect.php") ;
require_once("dbfunctions.php") ;
require_once("config.php") ;

$Actionmanager = new Actionmanager() ;

if(isset($_POST['command']) && $_POST['command'] == "login")
{
	$Actionmanager->login() ;
}
elseif(isset($_FILES['cstat']) && isset($_FILES['stud_pic'])) //&& $_POST['command'] == "bookstud")
{
	$Actionmanager->bookstud() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "searchcase")
{
	$Actionmanager->searchcase() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "add_staff")
{
	$Actionmanager->addStaff() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "change_pwrd")
{
	$Actionmanager->changePwrd() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "punish")
{
	$Actionmanager->punish() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "approve")
{
	$Actionmanager->approve() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "change_role")
{
	$Actionmanager->change_role() ;
}
elseif(isset($_POST['command']) && $_POST['command'] == "del_role")
{
	$Actionmanager->del_role() ;
}
/*elseif(isset($_POST['command']) && $_POST['command'] == "command")
{
	$Actionmanager->command() ;
}*/


class Actionmanager
{
	function login()
	{
		$connect = dbconnect() ;
		// $dataRead = new DataRead() ;
		$email = $_POST['email'] ;
		$password = passwordHash($_POST['password']) ;
		$query = mysqli_query($connect , "SELECT * FROM users WHERE email = '$email' ") ;
		$num = numQuery($query) ;
		if($num == 1)
		{
			// echo $password;
			$fetch = mysqli_fetch_assoc($query) ;
		
				$pword = $fetch['password'] ;
				$fullname = $fetch['fullname'] ;
				$access_id = $fetch['access_id'] ;
				$user_id = $fetch['user_id'] ;
				$email = $fetch['email'] ;
				// print_r($fetch) ;
			
			if($password == $pword)
			{
				session_start() ;
				$_SESSION['user_id'] = $user_id ;
				$_SESSION['fullname'] = $fullname ;
				$_SESSION['access_id'] = $access_id ;
				$_SESSION['mailer'] = $fetch['email'] ;
				// redirect("../dashboard.php") ;
				echo "Sign in Successfull! Preparing your account";
				?>
				<script type="text/javascript">
					window.location = "dashboard.php" ;
				</script>
				<?php
			}
			else
			{
				echo "Incorrect Password";
			}
		}
		else
		{
			echo "User Email does not exist";
		}
	}

	function bookstud()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$sname = $_POST['sname'] ;
		$pphone = $_POST['pphone'] ;
		$pmail = $_POST['pmail'] ;
		$pname = $_POST['pname'] ;
		$sid = mysqli_real_escape_string($connect , $_POST['sid']) ;
		$ctit = $_POST['ctit'] ;
		$filename = $_FILES["cstat"]["name"] ;
		$filetype = $_FILES['cstat']["type"] ;
		$filetmpname = $_FILES['cstat']['tmp_name'] ;
		$fileerror = $_FILES['cstat']['error'] ;
		$filesize = $_FILES['cstat']['size'] ;

		$filename2 = $_FILES["stud_pic"]["name"] ;
		$filetype2 = $_FILES['stud_pic']["type"] ;
		$filetmpname2 = $_FILES['stud_pic']['tmp_name'] ;
		$fileerror2 = $_FILES['stud_pic']['error'] ;
		$filesize2 = $_FILES['stud_pic']['size'] ;
		$truefiletype = array("image/jpg" , "image/jpeg" , "image/png") ;
		$csem = mysqli_real_escape_string($connect ,$_POST['csem']) ;
		$csesn = mysqli_real_escape_string($connect ,$_POST['csesn']) ;
		$user_id = $_POST['user_id'] ;
		if($filename == ''){echo "Please choose a statement to upload";}
		if($filename2 == ''){echo "Please choose a picture to upload";}
		if($filename != '' && !in_array($filetype, $truefiletype)){echo "Please choose a valid file";}
		if($filename2 != '' && !in_array($filetype2, $truefiletype)){echo "Please choose a valid file for student's picture";}
		if($fileerror == 0 && $filename !='' && in_array($filetype, $truefiletype) && $fileerror2 == 0 && $filename2 !='' && in_array($filetype2, $truefiletype))
		{
			$message = "Dear ".$pname." this is to notify you that your ward, ".$sname." will be facing a disciplinary panel on the account of ".$ctit.". We duly hope that we will be able to help him as we hope for your utmost coorperation." ;
			$sendsms = sendSMS($pphone , $message) ;
			$sendmail = sendEmail($pmail , $ctit , $message) ;
			if($sendsms && $sendmail)
			{
				$filetype = substr($filetype, 6) ;
				$filename = time().$sid.".".$filetype ;
				$filenewpath = "../images/uploads/cases/".$filename ;
				$movefile = move_uploaded_file($filetmpname, $filenewpath) ;

				$filetype2 = substr($filetype2, 6) ;
				$filename2 = time().$sname.".".$filetype ;
				$filenewpath2 = "../images/uploads/students/".$filename ;
				$movefile2 = move_uploaded_file($filetmpname2, $filenewpath2) ;
				if($movefile)
				{
					$bookstud = $dataWrite->bookstud($connect , $sname , $sid , $ctit , $user_id , $csesn , $csem , $filename , $filename2 , $pphone , $pmail , $pname) ;
					$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Case has been added successfully</p></div>" ;
					if($bookstud == $return)
					{
						echo $bookstud;
						?>
						<script type="text/javascript">
							window.location = "bookstudent.php" ;
						</script>
						<?php
					}
					else
					{
						echo $bookstud;
					}
				}
				else
				{
					echo "file  not moved";
				}
				if($movefile2)
				{
				}
				else
				{
					echo "file2 not moved";
				}
			}
			else
			{
				echo "An error encountered while trying to send the message please check your connection";
			}
		}
		else
		{
			echo "Error uploading case file";
		}
		
		/*if($bookstud)
		{
			echo $bookstud;
		}
		else
		{
			echo $bookstud;
		}*/
	}

	function searchcase()
	{
		$connect = dbconnect() ;
		$dataRead = new DataRead() ;
		$para = $_POST['para'] ;
		$valu = $_POST['valu'] ;
		if($valu != "")
		{
			$query = mysqli_query($connect , "SELECT * FROM case_file WHERE ".$para." LIKE '%".$valu."%' ") ;
			if($query)
			{
				$num = numQuery($query) ;
				if($num == 0)
				{
					/*$return = array('nill' => "No search result matches '".$valu."'" , );
					return $return ;*/
					echo "No search result matches '".$valu."'";
				}
				elseif($num == 1)
				{
					$fetch = mysqli_fetch_assoc($query) ;
					echo "<table class='table table-hover'>".
							"<thead><th>S/N</th><th>Case Title</th><th>Student's name</th>".
								"<th>Date</th></thead><tbody>".
								"<tr>".
									"<td>1</td>".
									"<td><a href='viewcase.php?p=".$fetch['case_id']."'>".$fetch['case_title']."</a></td>".
									"<td>".$fetch['stud_name']."</td>".
									"<td>".$fetch['date_created']."</td></tr>".
									"</tbody></table>";
				}
				elseif($num > 1)
				{
					$count = 0 ;
?>
						<table class="table table-hover table-striped">
							<thead>
								<th>S/N</th>
								<th>Case Title</th>
								<th>Student's name</th>
								<th>Date</th>
							</thead>
							<tbody>
<?php
					while($fetch = mysqli_fetch_assoc($query))
					{
						$count = $count + 1 ;
?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><a href="viewcase.php?p=<?php echo $fetch['case_id']; ?>"><?php echo $fetch['case_title'] ; ?></a></td>
									<td><?php echo $fetch['stud_name']; ?></td>
									<td><?php echo $fetch['date_created']; ?></td>
								</tr>
<?php
					}
?>
							</tbody>
						</table>
<?php
				}
			}
		}
		else
		{
			echo "";
		}
		/*$searchcase = $dataRead->searchcase($connect , $para , $valu) ;
		if($searchcase)
		{
			print_r($searchcase) ;
			// $fetch = mysqli_fetch_assoc($searchcase) ;
			$rows = count($searchcase) ;
			// $num = numQuery($searchcase) ;
			if($rows == 1)
			{
				echo $searchcase['nill'];
			}
			else
			{
				while($fetch = mysqli_fetch_assoc($searchcase)) {
					# code...
					echo $fetch['case_title'] ;
				}
				// echo $num ;//"<table class='table table-hover'>".
						//"<thead><th>". ;
			}
		}
		else
		{
			print_r($searchcase);
		}*/

	}

	function addStaff()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$sname = $_POST['sname'] ;
		$smail = $_POST['smail'] ;
		$password = passwordHash("password1234") ;
		$stafftype = $_POST['stafftype'] ;
		$user_id = $_POST['user_id'] ;
		$checkmail = mysqli_query($connect , "SELECT * FROM users WHERE email = '$smail' ") ;
		$num = numQuery($checkmail) ;
		if($num == 0)
		{
			$addStaff = $dataWrite->addstaff($connect , $sname , $smail , $password , $stafftype , $user_id) ;
			if($addStaff)
			{
				echo $addStaff;
			}
			else
			{
				echo $addStaff;
			}
		}
		else
		{
			echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'><p><i class='fa fa-warning'></i> Warning! This email is already in use</p></div>";
		}
	}

	function changePwrd()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$cpwrd = passwordHash($_POST['cpwrd']) ;
		$npwrd = passwordHash($_POST['npwrd']) ;
		$user_id = $_POST['user_id'] ;
		$query = $dataWrite->changePwrd($connect , $cpwrd , $npwrd , $user_id) ;
		if($query)
		{
			echo $query;
		}
		else
		{
			echo $query ; //"string";
		}
	}

	function punish()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$pstat = $_POST['pstat'] ;
		$user_id = $_POST['user_id'] ;
		$case_id = $_POST['case_id'] ;
		$query = $dataWrite->punish($connect , $pstat , $user_id , $case_id) ;
		$return = "<div class='sufee-alert alert with-close alert-primary alert-dismissible fade show'><p>Punishment added successfully</p></div>" ;
		if($query == $return)
		{
			echo $query ;//"succ";
			?>
				<script type="text/javascript">
					window.location = "notify.php" ;
				</script>
			<?php
		}
		else
		{
			echo $query;
		}
	}

	function approve()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$case_id = $_POST['case_id'] ;
		$query = $dataWrite->approve($connect , $case_id) ;
		if($query)
		{
			echo $query ;//"succ";
		}
		else
		{
			echo $query;
		}
	}

	function change_role()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$user_id = $_POST['user_id'] ;
		$role = $_POST['role'] ;
		$query = $dataWrite->change_role($connect , $user_id , $role) ;
		if($query)
		{
			echo $query;
		}
		else
		{
			echo $query;
		}
	}

	function del_role()
	{
		$connect = dbconnect() ;
		$dataWrite = new DataWrite() ;
		$user_id = $_POST['user_id'] ;
		$query = $dataWrite->del_role($connect , $user_id) ;
		if($query)
		{
			echo $query;
		}
		else
		{
			echo $query;
		}
	}
}
?>