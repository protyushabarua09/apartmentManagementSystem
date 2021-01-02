function deleteUnit(Id){
      var iAnswer = confirm("Are you sure you want to delete this Unit ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>unit/unitlist.php?id=' + Id;
    }
  }