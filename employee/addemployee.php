<?php 
include('../header.php');
include('../utility/common.php');
include(ROOT_PATH.'language/'.$lang_code_global.'/lang_add_employee.php');
if(!isset($_SESSION['objLogin'])){
    header("Location: " . WEB_URL . "logout.php");
    die();
}
$success = "none";
$e_name = '';
$e_email = '';
$e_contact = '';
$e_per_address = '';
$e_nid = '';
$e_designation = 0;
$e_date = '';
$ending_date = '';
$e_status = 0;
$e_password = '';
$branch_id = '';
$title = $_data['add_new_employee'];
$button_text = $_data['save_button_text'];
$successful_msg = $_data['added_employee_successfully'];
$form_url = WEB_URL . "employee/addemployee.php";
$id="";
$hdnid="0";
$image_emp = WEB_URL . 'img/no_image.jpg';
$img_track = '';

if(isset($_POST['txtEmpName'])){
    if(isset($_POST['hdn']) && $_POST['hdn'] == '0'){
    $e_password = $_POST['txtPassword'];
    $image_url = uploadImage();
    if(isset($_POST['chkEmpStaus'])){
            $e_status = 1;
    }
    $sql = "INSERT INTO tbl_add_employee(e_name,e_email, e_contact, e_per_address,e_nid,e_designation,e_date,ending_date,e_password,e_status,image,branch_id) values('$_POST[txtEmpName]','$_POST[txtEmpEmail]','$_POST[txtEmpContact]','$_POST[txtEmpPerAddress]','$_POST[txtEmpNID]','$_POST[ddlMemberType]','$_POST[txtEmpDate]','$_POST[txtEndingDate]','$e_password','$e_status','$image_url','" . $_SESSION['objLogin']['branch_id'] . "')";
    mysqli_query($link, $sql);
    ((is_null($___mysqli_res = mysqli_close($link))) ? false : $___mysqli_res);
    $url = WEB_URL . 'employee/employeelist.php?m=add';
    header("Location: $url");
    
}
else{
    $image_url = uploadImage();
    if($image_url == ''){
        $image_url = $_POST['img_exist'];
    }
    if(isset($_POST['chkEmpStaus'])){
            $e_status = 1;
    }
    $sql = "UPDATE `tbl_add_employee` SET `e_name`='".$_POST['txtEmpName']."',`e_email`='".$_POST['txtEmpEmail']."',`e_password`='".$_POST['txtPassword']."',`e_contact`='".$_POST['txtEmpContact']."',`e_per_address`='".$_POST['txtEmpPerAddress']."',`e_nid`='".$_POST['txtEmpNID']."',`e_designation`='".$_POST['ddlMemberType']."',`e_date`='".$_POST['txtEmpDate']."',`ending_date`='".$_POST['txtEndingDate']."',`e_status`='".$e_status."',`image`='".$image_url."' WHERE eid='".$_GET['id']."'";
    mysqli_query($link, $sql);
    $url = WEB_URL . 'employee/employeelist.php?m=up';
    header("Location: $url");
}

$success = "block";
}

if(isset($_GET['id']) && $_GET['id'] != ''){
    $result = mysqli_query($link, "SELECT * FROM tbl_add_employee where eid = '" . $_GET['id'] . "'");
    while($row = mysqli_fetch_array($result)){
        
        $e_name = $row['e_name'];
        $e_email = $row['e_email'];
        $e_contact = $row['e_contact'];
        $e_per_address = $row['e_per_address'];
        $e_nid = $row['e_nid'];
        $e_designation = $row['e_designation'];
        $e_date = $row['e_date'];
        $ending_date = $row['ending_date'];
        $e_status = $row['e_status'];
        $e_password = $row['e_password'];
        if($row['image'] != ''){
            $image_own = WEB_URL . 'img/upload/' . $row['image'];
            $img_track = $row['image'];
        }
        $hdnid = $_GET['id'];
        $title = $_data['update_employee'];
        $button_text =$_data['update_button_text'];
        $successful_msg="Update Employee Successfully";
        $form_url = WEB_URL . "employee/addemployee.php?id=".$_GET['id'];
    }
    
    //mysql_close($link);

}

//for image upload
function uploadImage(){
    if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploaded_file']['error'] == 0)) {
      $filename = basename($_FILES['uploaded_file']['name']);
      $ext = substr($filename, strrpos($filename, '.') + 1);
      if(($ext == "jpg" && $_FILES["uploaded_file"]["type"] == 'image/jpeg') || ($ext == "png" && $_FILES["uploaded_file"]["type"] == 'image/png') || ($ext == "gif" && $_FILES["uploaded_file"]["type"] == 'image/gif')){   
          $temp = explode(".",$_FILES["uploaded_file"]["name"]);
          $newfilename = NewGuid() . '.' .end($temp);
        move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], ROOT_PATH . '/img/upload/' . $newfilename);
        return $newfilename;
      }
      else{
          return '';
      }
    }
    return '';
}
function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,8) . '-' . 
        substr($s,8,4) . '-' . 
        substr($s,12,4). '-' . 
        substr($s,16,4). '-' . 
        substr($s,20); 
    return $guidText;
}
    
?>
<!-- Content Header (Page header) -->

<section class="content-header">
  <h1><?php echo $title;?></h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo WEB_URL?>/dashboard.php"><i class="fa fa-dashboard"></i><?php echo $_data['home_breadcam'];?></a></li>
    <li class="active"><?php echo $_data['add_new_employee_information_breadcam'];?></li>
    <li class="active"><?php echo $_data['add_new_employee_breadcam'];?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
<!-- Full Width boxes (Stat box) -->
<div class="row">
  <div class="col-md-12">
    <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?php echo WEB_URL; ?>employee/employeelist.php" data-original-title="<?php echo $_data['back_text'];?>"><i class="fa fa-reply"></i></a> </div>
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title"><?php echo $_data['add_new_employee_entry_form'];?></h3>
      </div>
      <form onSubmit="return validateMe();" action="<?php echo $form_url; ?>" method="post" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="txtEmpName"><?php echo $_data['add_new_form_field_text_1'];?> <span style="color:red;">*</span> :</label>
            <input type="text" name="txtEmpName" value="<?php echo $e_name;?>" id="txtEmpName" class="form-control" />
          </div>
          <div class="form-group">
            <label for="txtEmpEmail"><?php echo $_data['add_new_form_field_text_2'];?> <span style="color:red;">*</span> :</label>
            <input type="text" name="txtEmpEmail" value="<?php echo $e_email;?>" id="txtEmpEmail" class="form-control" />
          </div>
          <div class="form-group">
            <label for="txtPassword"><?php echo $_data['add_new_form_field_text_3'];?> <span style="color:red;">*</span> :</label>
            <input type="text" name="txtPassword" value="<?php echo $e_password;?>" id="txtPassword" class="form-control" />
          </div>
          <div class="form-group">
            <label for="txtEmpContact"><?php echo $_data['add_new_form_field_text_4'];?> <span style="color:red;">*</span> :</label>
            <input type="text" name="txtEmpContact" value="<?php echo $e_contact;?>" id="txtEmpContact" class="form-control" />
          </div>
          <div class="form-group">
            <label for="txtEmpPerAddress"><?php echo $_data['add_new_form_field_text_6'];?> <span style="color:red;">*</span> :</label>
            <textarea name="txtEmpPerAddress" id="txtEmpPerAddress" class="form-control"><?php echo $e_per_address;?></textarea>
          </div>
          <div class="form-group">
            <label for="txtEmpNID"><?php echo $_data['add_new_form_field_text_7'];?> <span style="color:red;">*</span> :</label>
            <input type="text" name="txtEmpNID" value="<?php echo $e_nid;?>" id="txtEmpNID" class="form-control" />
          </div>
          /*<div class="form-group">
            <label for="ddlMemberType"><?php echo $_data['add_new_form_field_text_8'];?> <span style="color:red;">*</span> :</label>
            <select name="ddlMemberType" id="ddlMemberType" class="form-control">
              <option value="">--<?php echo $_data['add_new_form_field_text_15'];?>--</option>
              <?php 
                      $result_type = mysqli_query($link, "SELECT * FROM tbl_add_member_type order by member_id ASC");
                    while($row_type = mysqli_fetch_array($result_type)){
                  ?>
              <option <?php if($e_designation == $row_type['member_id']){echo 'selected';}?> value="<?php echo $row_type['member_id'];?>"><?php echo $row_type['member_type'];?></option>
              <?php }?>
            </select>
          </div>*/
          <div class="form-group">
            <label for="txtEmpDate"><?php echo $_data['add_new_form_field_text_9'];?> <span style="color:red;">*</span> :</label>
            <input type="text" name="txtEmpDate" value="<?php echo $e_date;?>" id="txtEmpDate" class="form-control datepicker"/>
          </div>
          <div class="form-group">
            <label for="txtEndingDate"><?php echo $_data['add_new_form_field_text_10'];?> :</label>
            <input type="text" name="txtEndingDate" value="<?php echo $ending_date;?>" id="txtEndingDate" class="form-control datepicker"/>
          </div>
          <div class="form-group">
            <label for="chkRStaus"><?php echo $_data['add_new_form_field_text_11'];?> :</label>
            &nbsp;&nbsp;
            <input type="checkbox" name="chkEmpStaus" id="chkEmpStaus" <?php if($e_status == '1'){echo 'checked';}?> value="<?php echo $e_status;?>" class="minimal" />
            &nbsp;&nbsp;
            <?php if($e_status == '1'){echo $_data['add_new_form_field_text_12'];} else{echo $_data['add_new_form_field_text_13'];}?>
          </div>
          <div class="form-group">
            <label for="Prsnttxtarea"><?php echo $_data['add_new_form_field_text_14'];?> :</label>
            <img class="form-control" src="<?php echo $image_emp; ?>" style="height:100px;width:100px;" id="output"/>
            <input type="hidden" name="img_exist" value="<?php echo $img_track; ?>" />
          </div>
          <div class="form-group"> <span class="btn btn-file btn btn-primary"><?php echo $_data['upload_image'];?>
            <input type="file" name="uploaded_file" onchange="loadFile(event)" />
            </span> </div>
          <div class="form-group pull-right">
            <input type="submit" name="submit" class="btn btn-primary" value="<?php echo $button_text; ?>"/>
          </div>
        </div>
        <input type="hidden" value="<?php echo $hdnid; ?>" name="hdn"/>
      </form>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
<!-- /.row -->
<script type="text/javascript">
function validateMe(){
    if($("#txtEmpName").val() == ''){
        alert("Employee Name Required !!!");
        $("#txtEmpName").focus();
        return false;
    }
    else if($("#txtEmpEmail").val() == ''){
        alert("Email Required !!!");
        $("#txtEmpEmail").focus();
        return false;
    }
    else if($("#txtPassword").val() == ''){
        alert("Password Required !!!");
        $("#txtPassword").focus();
        return false;
    }
    else if($("#txtEmpContact").val() == ''){
        alert("Contact Number Required !!!");
        $("#txtEmpContact").focus();
        return false;
    }
    else if($("#txtEmpPreAddress").val() == ''){
        alert("Present Address Required !!!");
        $("#txtEmpPreAddress").focus();
        return false;
    }
    else if($("#txtEmpPerAddress").val() == ''){
        alert("Permanent Address Required !!!");
        $("#txtEmpPerAddress").focus();
        return false;
    }
    else if($("#txtEmpNID").val() == ''){
        alert("NID Required !!!");
        $("#txtEmpNID").focus();
        return false;
    }
    else if($("#ddlMemberType").val() == ''){
        alert("Designation Required !!!");
        $("#ddlMemberType").focus();
        return false;
    }
    else if($("#txtEmpDate").val() == ''){
        alert("Joining Date Required !!!");
        $("#txtEmpDate").focus();
        return false;
    }
    else{
        return true;
    }
}
</script>
<?php include('../footer.php'); ?>
