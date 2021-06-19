<?php
include_once("dbConnection.php");
class employee
{
    function __construct()
    {
        $this->dbconnection =new dbConnection();
    }
    function checkEmployeeAlreadyExists()
    {
        $sql="select * from `tbl_employee` where empCode='$this->empCode' 
                and empStatus=1";
        $result=$this->dbconnection->query($sql);
        $num=mysqli_num_rows($result);
        return $num;
    }
    function saveUploadedEmployeeDetails()
    {
        $sql="INSERT INTO `tbl_employee`(`empName`, `empCode`,`department`,`dob`, `doj`) 
        VALUES ('$this->empName','$this->empCode','$this->empDept','$this->dob','$this->doj')";
        $result=$this->dbconnection->query($sql);
        return $result;
    }
    function getEmployees()
    {
        $sql="select * from `tbl_employee` where empStatus=1";
        $result=$this->dbconnection->query($sql);
        return $result;
    }

}
    