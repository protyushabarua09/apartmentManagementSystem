<?php 
include('../header.php');
include('../utility/common.php');
include(ROOT_PATH.'language/'.$lang_code_global.'/lang_add_building_info.php');
if(!isset($_SESSION['objLogin'])){
    header("Location: " . WEB_URL . "logout.php");
    die();
}
$success = "none";
$name = '';
$address = '';
$building_image = '';
$branch_id = '';
$title = $_data['text_1'];
$button_text = $_data['save_button_text'];
$form_url = WEB_URL . "building/add_building_info.php";
$hdnid="0";
$image_building = WEB_URL . 'img/no_image.jpg';
$img_track = '';
$rowx_unit = array();

if(isset($_POST['txtBName'])){
    $sqlx = "DELETE FROM `tbl_add_building_info`";
    mysqli_query($link, $sqlx);
    $image_url = uploadImage();
    $sql = "INSERT INTO tbl_add_building_info(name,address,building_image,branch_id) values('$_POST[txtBName]','$_POST[txtBAddress]','$image_url','" . $_SESSION['objLogin']['branch_id'] . "')";
    mysqli_query($link, $sql);
  //mysql_close($link);
    
}
    $result = mysqli_query($link, "SELECT * FROM tbl_add_building_info where branch_id = " . (int)$_SESSION['objLogin']['branch_id'] . "");
    while($row = mysqli_fetch_array($result)){
        
        $name = $row['name'];
        $address = $row['address'];
        if($row['building_image'] != ''){
            $image_building = WEB_URL . 'img/upload/' . $row['building_image'];
            $img_track = $row['building_image'];
        }
    }
  
    //mysql_close($link);

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
    <li><a href="<?php echo WEB_URL?>dashboard.php"><i class="fa fa-dashboard"></i><?php echo $_data['home_breadcam'];?></a></li>
    <li class="active"><?php echo $_data['text_2'];?></li>
    <li class="active"><?php echo $_data['text_3'];?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
<!-- Full Width boxes (Stat box) -->
<div class="row">
  <div class="col-md-12">
    <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?php echo WEB_URL; ?>dashboard.php" data-original-title="<?php echo $_data['back_text'];?>"><i class="fa fa-reply"></i></a> </div>
    <div class="box box-info">
      <div class="box-header">
        <h3 style="color:red;font-weight:bold;" class="box-title"><?php echo $_data['text_4'];?></h3>
      </div>
      <form onSubmit="return validateMe();" action="" method="post" enctype="multipart/form-data">
        <div class="box-body">
        <div class="form-group">
          <label for="txtBName"><span style="color:red;">*</span><?php echo $_data['text_5'];?> :</label>
          <input type="text" name="txtBName" value="<?php echo $name;?>" id="txtBName" class="form-control" />
        </div>
        <div class="form-group">
          <label for="txtBAddress"><span style="color:red;">*</span><?php echo $_data['text_6'];?> :</label>
          <textarea name="txtBAddress" id="txtBAddress" class="form-control"><?php echo $address;?></textarea>
        </div>
          <div class="form-group">
            <label for="Prsnttxtarea"><?php echo $_data['text_13'];?> :</label>
            <img class="form-control" src="<?php echo $image_building; ?>" style="height:100px;width:100px;" id="output"/>
            <input type="hidden" name="img_exist" value="<?php echo $img_track; ?>" />
          </div>
          <div class="form-group"> <span class="btn btn-file btn btn-primary"><?php echo $_data['upload_image'];?>
            <input type="file" name="uploaded_file" onchange="loadFile(event)" />
            </span> </div>
          <div class="form-group pull-right">
            <input type="submit" name="submit" class="btn btn-primary" value="<?php echo $button_text; ?>"/>
          </div>
        </div>
      </form>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
</div>
<!-- /.row -->
<script type="text/javascript">
function validateMe(){
    if($("#txtBName").val() == ''){
        alert("Name is Required !!!");
        $("#txtBName").focus();
        return false;
    }
    else if($("#txtBAddress").val() == ''){
        alert("Address is Required !!!");
        $("#txtBAddress").focus();
        return false;
    }
    else{
        return true;
    }
}
</script>
<?php include('../footer.php'); ?>