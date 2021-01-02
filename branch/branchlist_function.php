function deleteBranch(Id){
      var iAnswer = confirm("Are you sure you want to delete this branch ?");
    if(iAnswer){
        window.location = 'branchlist.php?id=' + Id;
    }
  }