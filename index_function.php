function make_safe($variable) 
{
   $variable = strip_tags(mysqli_real_escape_string($GLOBALS["___mysqli_ston"], trim($variable)));
   return $variable; 
}

function validationForm(){
    if($("#username").val() == ''){
        alert("Email Required !!!");
        $("#username").focus();
        return false;
    }
    else if(!validateEmail($("#username").val())){
        alert("Valid Email Required !!!");
        $("#username").focus();
        return false;
    }
    else if($("#password").val() == ''){
        alert("Password Required !!!");
        $("#password").focus();
        return false;
    }
    else if($("#ddlLoginType").val() == ''){
        alert("Select User Type !!!");
        return false;
    }
    else{
        return true;
    }
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function mewhat(val){
    if(val != ''){
        if(val == '5'){
            $("#x_branch").show();
        }
        else{
            $("#x_branch").hide();
        }
    }
    else{
        $("#x_branch").hide();
    }
}