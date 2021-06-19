<?php 
session_start();
include 'Class/employee.php';
$obj=new employee();
if ($_FILES['flemployee']['size'] > 0)
    {
    //get the csv file
    $file = $_FILES['flemployee']['tmp_name'];
    $handle = fopen($file,"r");
$k=1;$i=1;$allowedColNum=5;
$batchcount=0;
        while ($data = fgetcsv($handle,1000,",","'"))
        {
            
            if(addslashes($data[0])!='Name' && addslashes($data[0])!='')
            {
           
           //print_r($data);echo '<br/>';
           
                $obj->empName=addslashes($data[0]);
                $obj->empCode= addslashes($data[1]);
                $obj->empDept=addslashes($data[2]);
                $obj->dob=date('Y-m-d',strtotime(addslashes($data[3])));
                $obj->doj=date('Y-m-d',strtotime(addslashes($data[4])));
                
                          $check=$obj->checkEmployeeAlreadyExists();
        if($check==0)
        {
             
                    $result=$obj->saveUploadedEmployeeDetails();              
                   
        $i++;
        }

    }

}
            
  echo "<script>window.location.replace('index.php')</script>";
    

}
?>