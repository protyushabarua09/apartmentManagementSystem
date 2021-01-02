function deleteOwner(Id){
      var iAnswer = confirm("Are you sure you want to delete this Owner ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>owner/ownerlist.php?id=' + Id;
    }
  }