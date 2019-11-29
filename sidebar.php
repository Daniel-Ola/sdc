<?php
require_once("php/dbconnect.php") ;
require_once("php/dbfunctions.php") ;
require_once("php/config.php") ;
// require_once("php/actionmanager.php") ;
require_once("php/settings.php") ;
$user_det = userDet() ;
?>

    <input id="user_id" style="display: none;" value="<?php echo $user_det['user_id']; ?>" />
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
                <a class="navbar-brand" href="#"><?php echo $user_det['fullname']; ?></a>
            </div>

            <?php $sidebar = sideBar($user_det['access_id']) ; include_once($sidebar) ?><!-- /.navbar-collapse -->
        </nav>
    </aside>