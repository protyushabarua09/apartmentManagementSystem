function validateMe(){
    if($("#txtFloor").val() == ''){
        alert("Floor Required !!!");
        $("#txtFloor").focus();
        return false;
    }
    else{
        return true;
    }
}