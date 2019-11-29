<div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Activities</h3><!-- /.menu-title -->
                    <li>
                        <a href="viewrecords.php"> <i class="menu-icon fa fa-laptop"></i>View Records</a>
                        <!-- <a href="viewcase.php"> <i class="menu-icon fa fa-laptop"></i>View Records</a> -->
                    </li>
                    <!-- <li>
                        <a href="searchcase.php"> <i class="menu-icon fa fa-laptop"></i>Search Case</a>
                        <!- <a href="viewcase.php"> <i class="menu-icon fa fa-laptop"></i>View Records</a> -
                    </li> -->
                    <li>
                        <a href="notify.php"> <i class="menu-icon fa fa-table"></i>Notifications <span class="badge rounded-circle" style="background-color: purple;"><?php echo numQuery($unappcases); ?></span></a>
                    </li>
                    <li>
                        <a href="punishment.php"> <i class="menu-icon fa fa-table"></i>Assign Punishments</a>
                    </li>
                    <!-- <li>
                        <a href="forum.php"> <i class="menu-icon fa fa-table"></i>Forum</a>
                    </li> -->
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Forms</a>
                    </li> -->

                    <h3 class="menu-title">Settings</h3><!-- /.menu-title -->

                    <li>
                        <a href="changepassword.php"> <i class="menu-icon fa fa-tasks"></i>Change Password</a>
                    </li>
                    <li>
                        <a href="logout.php"> <i class="menu-icon ti-share"></i>Logout </a>
                    </li>
                </ul>
            </div>