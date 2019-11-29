<?php
require_once("php/settings.php") ;
$u_det = userDet() ;
$aid = $u_det['access_id'] ;
switch ($aid) {
    case 0:
        header("location:editstaff.php") ;
        break;
    case 1:
        header("location:bookstudent.php") ;
        break;
    case 2:
        header("location:notify.php") ;
        break;
    case 3:
        header("location:searchstaff.php") ;
        break;
    
    default:
        header("location:login.php") ;
        break;
}
?>