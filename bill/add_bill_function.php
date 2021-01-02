function validateMe(){
    if($("#ddlBillType").val() == ''){
        alert("Bill Type Required !!!");
        $("#ddlBillType").focus();
        return false;
    }
    else if($("#txtBillDate").val() == ''){
        alert("Date is Required !!!");
        $("#txtBillDate").focus();
        return false;
    }
    else if($("#ddlBillMonth").val() == ''){
        alert("Bill Month is Required !!!");
        $("#ddlBillMonth").focus();
        return false;
    }
    else if($("#ddlBillYear").val() == ''){
        alert("Bill Year is Required !!!");
        $("#ddlBillYear").focus();
        return false;
    }
    else if($("#txtTotalAmount").val() == ''){
        alert("Total is Required !!!");
        $("#txtTotalAmount").focus();
        return false;
    }
    else if($("#txtDepositBankName").val() == ''){
        alert("Bank Name is Required !!!");
        $("#txtDepositBankName").focus();
        return false;
    }
    else if($("#txtBillDetails").val() == ''){
        alert("Bill Details Required !!!");
        $("#txtBillDetails").focus();
        return false;
    }
    else{
        return true;
    }
}