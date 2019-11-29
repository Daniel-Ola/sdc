<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Set Punishment</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
<?php
require_once("php/dbconnect.php") ;
require_once("php/dbfunctions.php") ;
require_once("php/config.php") ;
// require_once("php/actionmanager.php") ;
require_once("php/settings.php") ;
$user_det = userDet() ;
$case_det = viewCase() ;
$dataRead = new DataRead() ;
$unappcases = $dataRead->get_unapp_case() ;
// print_r($case_det) ;
?>
        <!-- Left Panel -->

    <?php include_once("sidebar.php") ; ?><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                       <!--  <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="changepassword.php"><i class="fa fa -cog"></i>Change Password</a>

                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <!-- <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?php echo getAccess($user_det['access_id']); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#"><?php echo getAccess($user_det['access_id']); ?></a></li>
                            <li><a href="#">Activities</a></li>
                            <li class="active">Punish Statement</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">
                    <div class="col-md-3">&nbsp;</div>
                    <div class="col-md-6" id="return" style="display: none ;">
                        <!-- <span class="badge badge-pill badge-primary">Success</span> -->
                            <!-- You successfully read this important alert. -->
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="col-md-3">&nbsp;</div>
                </div>

                <div class="alerts"><!-- <?php //echo passwordHash("password"); ?> -->
                    <div class="row">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-6 text-center">
                            <div id="return"></div>

                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Punishment Statement for <?php echo $case_det['stud_name'] ; ?></strong>
                                </div>
                                    <form action="php/actionmanager.php" method="post" class="" id="pstd">
                                <div class="card-body">
                                        <div class="form-group">
                                            <label for="nf-email" class=" form-control-label">Student's Name</label>
                                            <input type="sname" id="nf-email" placeholder="Enter Email.." name="sname" class="form-control" style="border: none;" readonly="readonly" value="<?php echo $case_det['stud_name'] ; ?>">
                                            <input type="text" name="case_id" id="case_id" value="<?php echo $case_det['case_id'] ; ?>" style="display: none;">
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">Student's Matriculation Number</label>
                                            <input type="text" id="nf-password" name="sid" placeholder="Enter Password.." class="form-control" style="border: none;" readonly="readonly" value="<?php echo $case_det['stud_id'] ; ?>">
                                            <!-- <span class="help-block">Please enter your password</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-password" class=" form-control-label">Case Title</label>
                                            <input type="text" id="nf-password" name="ctit" placeholder="Enter Password.." class="form-control" style="border: none;" readonly="readonly" value="<?php echo $case_det['case_title'] ; ?>">
                                            <!-- <span class="help-block">Please enter your password</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea-input" class=" form-control-label">Assign Punishment Statement</label>
                                            <div id="textarea-input" class="form-group">
                                                <label for="textarea-input" class=" form-control-label pull-left">Type</label>
                                                <select class="form-control" id="ptype">
                                                    <option value="0">Select a method of punishment...</option>
                                                    <option value="1">Warning</option>
                                                    <option value="2">Counselling</option>
                                                    <option value="3">Suspension</option>
                                                    <option value="4">Rustication</option>
                                                    <option value="5">Expulsion</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="duration" style="display: none;">
                                                <label for="" class=" form-control-label pull-left">Duration</label>
                                                <select class="form-control duration" id="councelling" style="display: none;">
                                                    <option value="">Select duration for councelling...</option>
                                                    <option value="1">1 week</option>
                                                    <option value="2">2 week</option>
                                                    <option value="3">3 week</option>
                                                    <option value="4">4 week</option>
                                                    <option value="5">5 week</option>
                                                    <option value="6">6 weeks</option>
                                                    <option value="7">As prescribed by the councellor</option>
                                                </select>
                                                <select class="form-control duration" id="suspension" style="display: none;">
                                                    <option value="">Select duration suspension...</option>
                                                    <option value="1">1 week</option>
                                                    <option value="2">2 weeks</option>
                                                    <option value="3">1 semester</option>
                                                    <option value="4">2 semesters</option>
                                                    <!-- <option value="3">As prescribed by the councellor</option> -->
                                                </select>
                                                <select class="form-control duration" id="rustication" style="display: none;">
                                                    <option value="">Select duration for rustication...</option>
                                                    <option value="1">1 session</option>
                                                    <option value="2">2 sessions</option>
                                                    <!-- <option value="3">As prescribed by the councellor</option> -->
                                                </select>
                                            </div>
                                            <input type="text" id="inputpunish" name="pstat" value="0" style="display: none;">
                                            <!-- <textarea name="pstat" id="textarea-input" rows="9" placeholder="Statement..." class="form-control" required="required"></textarea> -->
                                        </div>
                                <div class="card-footer" style="display: none;" id="foot">
                                    <?php
                                        if($case_det['status'] != 3)
                                        {
                                    ?>
                                    <button type="submit" class="btn btn-primary btn-sm pull-left" id="asspun">
                                      <i class="fa fa-plus"></i> Assign
                                    </button>
                                    <?php
                                        }
                                    ?>
                                    <!-- <button type="reset" class="btn btn-danger btn-sm">
                                      <i class="fa fa-ban"></i> Reset
                                    </button> -->
                                </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-3">&nbsp;</div>
                    </div>
                </div> <!-- .alerts -->


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/punish.js"></script>
    <script type="text/javascript">
        // alert(4523) ;
/*$("#pstd").submit(function(event){
    event.preventDefault() ;
    form = $(this) ,
    pstat = form.find("textarea[name='pstat']").val() ,
    url = form.attr("action") ,
    user_id = $("#user_id").val() ,
    case_id = $("#case_id").val() ;
    // alert(user_id+" "+case_id) ;
    var punish = $.post(url , {
        pstat: pstat ,
        user_id: user_id ,
        case_id: case_id ,
        command: "punish"
    }) ;

    punish.done(function(data){
        // alert(data) ;
        $("#return").html(data) ;
        $("#return").show() ;
    }) ;
}) ;*/
    </script>


</body>
</html>