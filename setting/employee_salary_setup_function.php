function deleteEmployeeSalary(Id){
      var iAnswer = confirm("Are you sure you want to delete this Employee Salary ?");
    if(iAnswer){
        window.location = '<?php echo WEB_URL;?>setting/employee_salary_setup.php?delid=' + Id;
    }
  }