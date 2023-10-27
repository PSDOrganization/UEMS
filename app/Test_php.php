<?php

namespace App;

class Test_php{
    //Function to validate admin credentials
    public function validate($con,$user) {
        $result=mysqli_query($con,$user);
        $num1=1;
        if(mysqli_num_rows($result)==1)
        {
        return $num1;
        }
    }

    //Function to add new user to the database
    public function addproduct($con) {
        $sql="INSERT INTO admin (firstname, lastname, employeeid, emailid, securityquestion1, securityquestion2, securityquestion3, pass1, pass2) VALUES ('sai', 'goutham', 'SLU123467', 'sai@gmail.com', 'some', 'some', 'some', 'sai1234', 'sai1234')";
        $result=mysqli_query($con,$sql);
        $num1=1;
        if($result)
        {
        return $num1;
        }
    }
    //Function to update the password 
    public function update($con) {
        $user="UPDATE admin SET pass1='Mounika@12x', pass2='Mounika@12x' where employeeid='SLU1111100'";
        $result=mysqli_query($con,$user);
        $num1=1;
        if($result)
        {
        return $num1;
        }
    }
    }
}
