function deleteBill(Id){
      var iAnswer = confirm("Are you sure you want to delete this Bill ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL; ?>bill/bill_list.php?id=' + Id;
    }
  }
  