<?php

class SampleTest extends \PHPUnit\Framework\TestCase{
    //Function to test admin credentials validation feature
    public function testcase1() {
        $cal=new App\Test_php;
        $host = "localhost";
        $usern = "root";
        $pass = "";
        $dbname = "uems";
        $con = mysqli_connect($host, $usern, $pass, $dbname);
        $user="SELECT * from admin where emailid='saigouthamch27@gmail.com' and pass1='sai12345'";
        $result=$cal->validate($con,$user);
        $this->assertEquals(1, $result);
    }
    //Function to test add details
    public function testcase2(){
        $cal=new App\Test_php;
        $host = "localhost";
        $usern = "root";
        $pass = "";
        $dbname = "uems";
        $con = mysqli_connect($host, $usern, $pass, $dbname);
        $result=$cal->addadmin($con);
        $this->assertEquals(1, $result);
    }
    //Function to test to update password
    public function testcase3(){
        $cal=new App\Test_php;
        $host = "localhost";
        $usern = "root";
        $pass = "";
        $dbname = "uems";
        $con = mysqli_connect($host, $usern, $pass, $dbname);
        $result=$cal->update($con);
        $this->assertEquals(1, $result);
    }
    //Function to test whether employee ID is present in the admin table 
    public function testcase4(){
        $cal=new App\Test_php;
        $host = "localhost";
        $usern = "root";
        $pass = "";
        $dbname = "uems";
        $con = mysqli_connect($host, $usern, $pass, $dbname);
        $user="SELECT * from admin where employeeid='SLU1234567'";
        $result=$cal->search($con,$user);
        $this->assertEquals(1, $result);
    }
    
     public function testTableExists()
    {
        $cal = new App\Test_php;
        $host = "localhost";
        $usern = "root";
        $pass = "";
        $dbname = "uems";
        $con = mysqli_connect($host, $usern, $pass, $dbname);
        $tableName = 'event';
    
        $result = $cal->tableExists($con, $tableName);
    
        $this->assertTrue($result);
    }
}
