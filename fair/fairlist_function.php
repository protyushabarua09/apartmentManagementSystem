function deleteFair(Id){
      var iAnswer = confirm("Are you sure you want to delete this Fair ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>fair/fairlist.php?id=' + Id;
    }
  }