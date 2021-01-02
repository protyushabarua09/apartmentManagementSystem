function validationForm(){
    if($("#username").val() == ''){
        alert("Valid Email Required !!!");
        $("#username").focus();
        return false;
    }
    else if($("#ddlLoginType").val() == '-1'){
        alert("Select Login Type !!!");
        return false;
    }
    else{
        return true;
    }
}