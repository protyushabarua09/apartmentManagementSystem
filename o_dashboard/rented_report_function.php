function getFairInfo(){
        //var floor_id = $("#ddlFloorNo").val();
        var unit_id = $("#ddlUnitNo").val();
        var month_id = $("#ddlMonth").val();
        var xyear = $("#ddlYear").val();
        
        if(unit_id != '' && month_id != '' && xyear != ''){
            //window.location = "<?php //echo WEB_URL;?>report/mark_info.php?cid=" + class_id + '&eid=' + exam_id + '&sbid=' + subject_id;
            window.open('<?php echo WEB_URL;?>o_dashboard/rented_all_info.php?uid=' + unit_id + '&mid=' + month_id + '&yid=' + xyear,'_blank');
        }
        else if(unit_id != '' && month_id != ''){
            window.open('<?php echo WEB_URL;?>o_dashboard/rented_info_unit_month.php?uid=' + unit_id + '&mid=' + month_id,'_blank');
            //alert('Please select all 3 fields');
        }
        else if(unit_id != '' && xyear != ''){
            window.open('<?php echo WEB_URL;?>o_dashboard/rented_info_unit_year.php?uid=' + unit_id + '&yid=' + xyear,'_blank');
            //alert('Please select all 3 fields');
        }
        else if(unit_id != ''){
            window.open('<?php echo WEB_URL;?>o_dashboard/rented_info_unit.php?uid=' + unit_id,'_blank');
            //alert('Please select all 3 fields');
        }
        
        else{
            alert('Please select at least one or more fields');
        }
    }