function deleteEmployee(Id){
      var iAnswer = confirm("Are you sure you want to delete this Employee ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>employee/employeelist.php?id=' + Id;
    }
  }