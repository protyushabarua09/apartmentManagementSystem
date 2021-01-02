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