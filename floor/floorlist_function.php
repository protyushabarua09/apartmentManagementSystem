function deleteFloor(Id){
      var iAnswer = confirm("Are you sure you want to delete this Floor ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>floor/floorlist.php?id=' + Id;
    }
  }