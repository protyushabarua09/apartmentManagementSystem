    function getFairInfo(){
        var month_id = $("#ddlMonth").val();
        var xyear = $("#ddlYear").val();
        
        if(month_id != '' && xyear != ''){
            window.open('<?php echo WEB_URL;?>t_dashboard/r_all_info.php?mid=' + month_id + '&yid=' + xyear,'_blank');
        }
        else if(month_id != ''){
            window.open('<?php echo WEB_URL;?>t_dashboard/r_info_month.php?mid=' + month_id,'_blank');
            //alert('Please select all 3 fields');
        }
        else if(xyear != ''){
            window.open('<?php echo WEB_URL;?>t_dashboard/r_info_year.php?yid=' + xyear,'_blank');
            //alert('Please select all 3 fields');
        }        
        else{
            alert('Please select at least one or more fields');
        }
    }