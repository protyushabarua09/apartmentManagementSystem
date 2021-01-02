function deleteRent(Id){
      var iAnswer = confirm("Are you sure you want to delete this Rent ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>rent/rentlist.php?id=' + Id;
    }
  }
  