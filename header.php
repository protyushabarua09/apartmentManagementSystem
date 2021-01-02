<?php 
ob_start();
session_start();
include(__DIR__ . "/config.php");
$page_name = '';
$lang_code_global = "English";
$global_currency = "Tk.";
$currency_position = "left";
$currency_sep = ".";

$page_name = pathinfo(curPageURL(),PATHINFO_FILENAME);
function curPageURL() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<?php
if(!isset($_SESSION['objLogin'])){
    header("Location: ".WEB_URL."logout.php");
    die();
}
$query_ams_settings = mysqli_query($link, "SELECT * FROM tbl_settings");
if($row_query_ams_core = mysqli_fetch_array($query_ams_settings)){
    $lang_code_global = $row_query_ams_core['lang_code'];
    $global_currency = $row_query_ams_core['currency'];
    $currency_position = $row_query_ams_core['currency_position'];
    $currency_sep = $row_query_ams_core['currency_seperator'];
}
include(ROOT_PATH.'language/'.$lang_code_global.'/lang_left_menu.php');
include(ROOT_PATH.'language/'.$lang_code_global.'/lang_common.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BLUE AMS</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.4 -->
<link href="<?php echo WEB_URL; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo WEB_URL; ?>dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons -->
<link href="<?php echo WEB_URL; ?>dist/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo WEB_URL; ?>dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
 folder instead of downloading all of them to reduce the load. -->
<link href="<?php echo WEB_URL; ?>dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck for checkboxes and radio inputs -->
<link href="<?php echo WEB_URL; ?>plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_URL; ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_URL; ?>dist/css/dataTables.responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_URL; ?>dist/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_URL; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- jQuery 2.1.4 -->
<script src="<?php echo WEB_URL; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo WEB_URL; ?>dist/js/printThis.js"></script>
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">AMS</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>BLUE</b> Apartment Management System</span> </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <ul class="dropdown-menu">
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li>
                <!-- start message -->
                <a href="#">
                <div class="pull-left"> <img src="<?php echo WEB_URL; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/> </div>
                </a> </li>
              <!-- end message -->
            </ul>
          </li>
          <li class="footer"><a href="#"></a></li>
        </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user fa-lg"></i> <span class="hidden-xs"> <?php echo $_SESSION['objLogin']['name']; ?> </span> </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header"> <img src="<?php echo WEB_URL; ?>assets/img/user.png" class="img-circle" alt="User Image" />
              <p> <?php echo $_SESSION['objLogin']['name']; ?> 
              <small>
                <?php if($_SESSION['login_type'] == '1'){echo 'Admin';} else if($_SESSION['login_type'] == '2'){echo 'Owner';} else if($_SESSION['login_type'] == '3'){echo 'Employee';} else {echo 'Employee';} ?>
                <br/><?php echo $_SESSION['objLogin']['branch_name']; ?></p></small>
            </li>
            <!-- Menu Body -->
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left"><a data-target="#user_profile" data-toggle="modal" class="btn btn-success btn-flat">Profile</a></div>
              <div class="pull-right"> <a href="<?php echo WEB_URL; ?>logout.php" class="btn btn-danger btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="margin-top:10px;">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="<?php if($page_name != '' && $page_name == 'dashboard'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>dashboard.php"><i class="fa fa-dashboard"></i> <span><?php echo $_data['menu_dashboard']; ?></span></a> </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addfloor' || $page_name == 'floorlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-drupal"></i> <span><?php echo $_data['menu_floor']; ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'floorlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>floor/floorlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_floor_list']; ?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'addfloor'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>floor/addfloor.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_floor_add']; ?></a></li>
        </ul>
      </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addunit' || $page_name == 'unitlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-empire"></i> <span><?php echo $_data['menu_unit_information']; ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'unitlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>unit/unitlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_unit_list']; ?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'addunit'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>unit/addunit.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_unit']; ?></a></li>
        </ul>
      </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addfair' || $page_name == 'fairlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-money"></i> <span><?php echo $_data['menu_rent_collection']; ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'fairlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>fair/fairlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_rent_list']; ?></a></li>
      <li class="<?php if($page_name != '' && $page_name == 'addfair'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>fair/addfair.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_rent']; ?></a></li>
        </ul>
      </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addowner' || $page_name == 'ownerlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-user"></i> <span><?php echo $_data['menu_owner_information']; ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'ownerlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>owner/ownerlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_owner_list']; ?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'addowner'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>owner/addowner.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_owner']; ?></a></li>
        </ul>
      </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addrent' || $page_name == 'rentlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-users"></i> <span><?php echo $_data['menu_renter_information']; ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'rentlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>rent/rentlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_renter_list']; ?></a></li>
      <li class="<?php if($page_name != '' && $page_name == 'addrent'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>rent/addrent.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_renter']; ?></a></li>
        </ul>
      </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addemployee' || $page_name == 'employeelist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-user"></i> <span><?php echo $_data['menu_employee_information']; ?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'employeelist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>employee/employeelist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_employee_list']; ?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'addemployee'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>employee/addemployee.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_employee']; ?></a></li>
        </ul>
      </li>
      
       <li class="treeview <?php if($page_name != '' && $page_name == 'add_bill' || $page_name == 'bill_list'){echo 'active';}?>"> <a href="#"> <i class="fa fa-money"></i> <span><?php echo $_data['menu_bill'];?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'bill_list'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>bill/bill_list.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_bill_list'];?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'add_bill'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>bill/add_bill.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_bill'];?></a></li>
        </ul>
      </li>
      <li class="<?php if($page_name != '' && $page_name == 'add_building_info'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>building/add_building_info.php"><i class="fa fa-building"></i> <span><?php echo $_data['menu_building_info'];?></span></a> </li>
      <li class="treeview <?php if($page_name != '' && $page_name == 'addcomplain' || $page_name == 'complainlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-warning"></i> <span><?php echo $_data['menu_complain'];?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'complainlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>complain/complainlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_complain_list'];?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'addcomplain'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>complain/addcomplain.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_add_complain'];?></a></li>
        </ul>
      </li>
      
      <li class="treeview <?php if($page_name != '' && $page_name == 'addbranch' || $page_name == 'branchlist'){echo 'active';}?>"> <a href="#"> <i class="fa fa-users"></i> <span><?php echo $_data['branch'];?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php if($page_name != '' && $page_name == 'branchlist'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>branch/branchlist.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['branch_list'];?></a></li>
          <li class="<?php if($page_name != '' && $page_name == 'addbranch'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>branch/addbranch.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['add_branch'];?></a></li>
        </ul>
      </li>
    
      <li class="treeview <?php if($page_name == 'employee_salary_setup' || $page_name == 'member_type_setup' || $page_name == 'language' || $page_name == 'admin'){echo 'active';}?>"> <a href="#"> <i class="fa fa-gear"></i> <span><?php echo $_data['menu_settings'];?></span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
        
          <li class="<?php if($page_name != '' && $page_name == 'employee_salary_setup'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>setting/employee_salary_setup.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_employee_setup'];?></a></li>
           <li class="<?php if($page_name != '' && $page_name == 'language'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>setting/language.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_language_setup'];?></a></li>
           <li class="<?php if($page_name != '' && $page_name == 'admin'){echo 'active';}?>"><a href="<?php echo WEB_URL; ?>setting/admin.php"><i class="fa fa-arrow-circle-right"></i><?php echo $_data['menu_admin_setup'];?></a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Add the sidebar's background. This div must be placed
 immediately after the control sidebar -->
<form id="updateprofile" action="<?php echo WEB_URL; ?>ajax/updateProfile.php" method="post">
  <div class="modal fade" role="dialog" id="user_profile" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel">Update Your Profile</h4>
        </div>
        <div class="modal-body">
          <?php 
            $image = WEB_URL . 'img/no_image.jpg';    
            if(isset($_SESSION['objLogin']['image'])){
                if(file_exists(ROOT_PATH . '/img/upload/' . $_SESSION['objLogin']['image']) && $_SESSION['objLogin']['image'] != ''){
                    $image = WEB_URL . 'img/upload/' . $_SESSION['objLogin']['image'];
                }
            }
          ?>
          <div align="center"><img class="photo_img_round" style="width:100px;height:100px;" src="<?php echo $image;  ?>" /></div>
          <h4 align="center"><?php echo $_SESSION['objLogin']['name']; ?></h4>
          <h4 align="center">
            <?php if($_SESSION['login_type'] == '1'){echo 'Admin';} else if($_SESSION['login_type'] == '2'){echo 'Owner';} else if($_SESSION['login_type'] == '3'){echo 'Employee';} else if($_SESSION['login_type'] == '4'){echo 'Employee';} else {echo 'Super Admin';}?>
          </h4>
          <div class="form-group">
            <label class="control-label">Name:&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="txtProfileName" name="txtProfileName" value="<?php echo $_SESSION['objLogin']['name']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Email:&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="txtProfileEmail" name="txtProfileEmail" value="<?php echo $_SESSION['objLogin']['email']; ?>">
          </div>
          <div class="form-group">
            <label class="control-label">Password:&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="txtProfilePassword" name="txtProfilePassword" value="<?php echo $_SESSION['objLogin']['password']; ?>">
          </div>
          <div style="color:orange;font-weight:bold;text-align:left;font-size:15px;">After update application will be logout automatically.</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onClick="javascript:$('#updateprofile').submit();">Update</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <?php if($_SESSION['login_type'] == '1'){ ?>
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['objLogin']['aid']; ?>" >
  <?php } else { ?>
  <input type="hidden" name="user_id" value="<?php echo $_SESSION['objLogin']['user_id']; ?>" >
  <?php } ?>
</form>