function validateMe(){
    if($("#ddlFloor").val() == ''){
        alert("Select Floor !!!");
        $("#ddlFloor").focus();
        return false;
    }
    else if($("#txtUnit").val() == ''){
        alert("Unit Required !!!");
        $("#txtUnit").focus();
        return false;
    }
    else{
        return true;
    }
}