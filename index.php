<?php
session_start();
include 'Class/employee.php';
$obj=new employee();
$data=$obj->getEmployees();
?>
<!DOCTYPE html>
<html>
<head>
<style>
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 12px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

#employee {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#employee td, #employee th {
  border: 1px solid #ddd;
  padding: 8px;
}

#employee tr:nth-child(even){background-color: #f2f2f2;}

#employee tr:hover {background-color: #ddd;}

#employee th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<form name="frmEmployee" id="frmEmployee" method="post" action="saveEmployeeData.php" enctype="multipart/form-data" onsubmit="return validateform();">   
                    <table width="500px">
                        <tr>
                            <td align="left">
                                <?php
                                if(isset($_SESSION['msg']))
                                    echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="left">
                               <div><u>Upload Employee Details</u>
                               </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr id="trNewClass">
                                        <td colspan="2">
                                           
                                            <table width="100%>
                                                 
                                         <tr>
                                         <td><label class="lbl">Select File</label></td>
                                        <td><input type="file" id="flemployee" name="flemployee" style="float: left"></input>                                      
                                        </td>
                                    </tr>
                                    <tr>                                        
                                        <td colspan="2"><a href="downloadEmployeeFormat.php" style="color:purple;font-size: 12px;padding-right: 250px"><b>Download format</b></a></td>
                                    </tr>
                                     <tr>
                                         <td colspan="2" style="padding-right: 330px;"> <input type="submit" id="btnUpload" name="btnUpload" value="Upload" class="btn btn-info btn-xs" style="float: right" ></input></td>
                                    </tr>
                                              
                                            </table>
                                                 
                                        </td>
                                    </tr>
                                    
                                    
                                    
                                </table>
                               
                            </td>
                        </tr>
                    </table>
                    </form>

<br>
<h5>Employees Details</h5>
<?php
if(mysqli_num_rows($data)>0)
{
?>
<table  id="employee">
<tr>
<th>Sl.No</th>
<th>Employee Name</th>
<th>Employee Code</th>
<th>Department</th>
<th>Age</th>
<th>Years of Experience</th>
</tr>
<?php
$i=1;
while($da=mysqli_fetch_array($data,MYSQLI_BOTH))
{
 $dateOfBirth=date($da['dob']);
 $today = date("Y-m-d");
 $diff =date_diff(date_create($dateOfBirth), date_create($today));
 $age=$diff->format('%y');

    $datetime1 = new DateTime($da['doj']);
    $datetime2 = new DateTime($today);
    $interval = $datetime1->diff($datetime2);
    $experience=$interval->format('%y years %m months and %d days');
   ?> 
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $da['empName'];?></td>
<td><?php echo $da['empCode'];?></td>
<td><?php echo $da['department'];?></td>
<td><?php echo $age;?></td>
<td><?php echo $experience;?></td>
   
    <?php
     $i++;
}
?>
</table>
<?php
}
else
{
    ?>
<span style="color:red;font-weight:bold">Employees details not yet added..!</span>
    <?php

}
?>
</body>
</html>