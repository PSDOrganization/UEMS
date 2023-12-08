<?php

namespace App;

class AdminAuthentication
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function authenticate($emailid, $pass1)
    {
        // Simulate executing a query
        $queryResult = $this->db->executeQuery("SELECT emailid, pass1 FROM admin WHERE emailid='$emailid' and pass1='$pass1'");

        // Simulate fetching a row from the result set
        $row = $this->db->fetchAssoc($queryResult);

        var_dump($row);  // Add this line to print the $row value

        if ($row["emailid"]==$emailid && $row["pass1"]==$pass1) {
            echo "Admin login successful";
            return true;
            // Simulate starting a session and redirecting
        } else {
            echo "Invalid admin login";
            return false;
            // Simulate redirecting
        }
    }

}
?>
