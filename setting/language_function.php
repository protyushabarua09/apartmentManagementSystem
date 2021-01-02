 function deleteYear(Id){
      var iAnswer = confirm("Are you sure you want to delete this Year ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL;?>setting/year_setup.php?delid=' + Id;
    }
  }