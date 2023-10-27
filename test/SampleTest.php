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
    //Function to test add products features
    public function testcase3(){
        $cal=new App\Test_php;
        $host = "localhost";
        $usern = "root";
        $pass = "";
        $dbname = "uems";
        $con = mysqli_connect($host, $usern, $pass, $dbname);
        $result=$cal->addproduct($con);
        $this->assertEquals(1, $result);
    }
}