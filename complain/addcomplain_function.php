function validateMe(){
    if($("#txtCTitle").val() == ''){
        alert("Title is Required !!!");
        $("#txtCTitle").focus();
        return false;
    }
    else if($("#txtCDescription").val() == ''){
        alert("Description is Required !!!");
        $("#txtCDescription").focus();
        return false;
    }
    else if($("#txtCDate").val() == ''){
        alert("Date is  Required !!!");
        $("#txtCDate").focus();
        return false;
    }
    else{
        return true;
    }
}