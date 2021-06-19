<?php
class dbConnection {
        var $con;
        var $ret;
        var $result;
    function __construct()
    {
     
        $this->con = new mysqli("localhost","root","","employee");
        if ($this->con->connect_error) {
            die("Connection failed: ");
        } 
        return $this->con;
    }
    function query($sql)
    {
        $ret=mysqli_query($this->con,$sql)or 
        die('<br><div style="padding:25px;color:red">No Result</div>');

        return $ret;
    }
}
    ?>