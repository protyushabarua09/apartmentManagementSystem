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

function validateMe(){
    if($("#txtOwnerName").val() == ''){
        alert("Owner Name Required !!!");
        $("#txtOwnerName").focus();
        return false;
    }
    else if($("#txtOwnerEmail").val() == ''){
        alert("Email Required !!!");
        $("#txtOwnerEmail").focus();
        return false;
    }
    else if($("#txtPassword").val() == ''){
        alert("Password Required !!!");
        $("#txtPassword").focus();
        return false;
    }
    else if($("#txtOwnerContact").val() == ''){
        alert("Contact Number Required !!!");
        $("#txtOwnerContact").focus();
        return false;
    }
    else if($("#txtOwnerPreAddress").val() == ''){
        alert("Present Address Required !!!");
        $("#txtOwnerPreAddress").focus();
        return false;
    }
    else if($("#txtOwnerPerAddress").val() == ''){
        alert("Permanent Address Required !!!");
        $("#txtOwnerPerAddress").focus();
        return false;
    }
    else if($("#txtOwnerNID").val() == ''){
        alert("NID Required !!!");
        $("#txtOwnerNID").focus();
        return false;
    }
    else{
        return true;
    }
}