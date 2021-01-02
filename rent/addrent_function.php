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
    if($("#txtRName").val() == ''){
        alert("Rented Name Required !!!");
        $("#txtRName").focus();
        return false;
    }
    else if($("#txtREmail").val() == ''){
        alert("Email Required !!!");
        $("#txtREmail").focus();
        return false;
    }
    else if($("#txtPassword").val() == ''){
        alert("Password Required !!!");
        $("#txtPassword").focus();
        return false;
    }
    else if($("#txtRContact").val() == ''){
        alert("Contact Number Required !!!");
        $("#txtRContact").focus();
        return false;
    }
    else if($("#txtRAddress").val() == ''){
        alert("Address Required !!!");
        $("#txtRAddress").focus();
        return false;
    }
    else if($("#txtRentedNID").val() == ''){
        alert("NID Required !!!");
        $("#txtRentedNID").focus();
        return false;
    }
    else if($("#ddlFloorNo").val() == ''){
        alert("Floor Required !!!");
        $("#ddlFloorNo").focus();
        return false;
    }
    else if($("#ddlUnitNo").val() == ''){
        alert("Unit Required !!!");
        $("#ddlUnitNo").focus();
        return false;
    }
    else if($("#txtRAdvance").val() == ''){
        alert("Advance Rent Required !!!");
        $("#txtRAdvance").focus();
        return false;
    }
    else if($("#txtRentPerMonth").val() == ''){
        alert("Rent Per Month Required !!!");
        $("#txtRentPerMonth").focus();
        return false;
    }
    else if($("#txtRDate").val() == ''){
        alert("Rent Date Required !!!");
        $("#txtRDate").focus();
        return false;
    }
    else if($("#ddlMonth").val() == ''){
        alert("Rented Month Required !!!");
        $("#ddlMonth").focus();
        return false;
    }
    else if($("#ddlYear").val() == ''){
        alert("Rented Year Required !!!");
        $("#ddlYear").focus();
        return false;
    }
    else{
        return true;
    }
}
