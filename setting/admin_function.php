function deleteAdmin(Id){
      var iAnswer = confirm("Are you sure you want to delete this Admin ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL;?>setting/admin.php?delid=' + Id;
    }
  }