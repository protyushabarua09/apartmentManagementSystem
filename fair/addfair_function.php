function validateMe(){
    if($("#ddlFloorNo").val() == ''){
        alert("Floor Required !!!");
        $("#ddlFloorNo").focus();
        return false;
    }
    else if($("#ddlUnitNo").val() == ''){
        alert("Unit Required !!!");
        $("#ddlUnitNo").focus();
        return false;
    }
    else if($("#ddlMonth").val() == ''){
        alert("Month Required !!!");
        $("#ddlMonth").focus();
        return false;
    }
    else if($("#txtWaterBill").val() == ''){
        alert("Water Bill Required !!!");
        $("#txtWaterBill").focus();
        return false;
    }
    else if($("#txtElectricBill").val() == ''){
        alert("Electric Bill Required !!!");
        $("#txtElectricBill").focus();
        return false;
    }
    else if($("#txtGasBill").val() == ''){
        alert("Gas Bill Required !!!");
        $("#txtGasBill").focus();
        return false;
    }
    else if($("#txtSecurityBill").val() == ''){
        alert("Security Bill Required !!!");
        $("#txtSecurityBill").focus();
        return false;
    }
    else if($("#txtUtilityBill").val() == ''){
        alert("Utility Bill Required !!!");
        $("#txtUtilityBill").focus();
        return false;
    }
    else if($("#txtIssueDate").val() == ''){
        alert("Issue Date Required !!!");
        $("#txtIssueDate").focus();
        return false;
    }
    else{
        return true;
    }
}