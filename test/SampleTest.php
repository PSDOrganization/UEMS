<?php
use App\Test_php;
use App\AdminAuthentication;
use App\MockDatabase;
use PHPUnit\Framework\TestCase;
class SampleTest extends \PHPUnit\Framework\TestCase{
    //Function to test admin credentials validation feature
    public function testSuccessfulAuthentication()
    {
        // Instantiate the MockDatabase class with sample data
        $mockData = array(
            array('emailid' => 'admin@example.com', 'pass1' => 'adminpass'),
            // Add more sample data as needed
        );

        $mockDb = new MockDatabase($mockData);

        // Instantiate the AdminAuthentication class with the mock database
        $adminAuthentication = new AdminAuthentication($mockDb);

        // Use the authentication method with valid credentials
        $result = $adminAuthentication->authenticate('admin@example.com', 'adminpass');

        // Assert that the authentication is successful
        $this->assertEquals(true, $result);
    }

    public function testFailedAuthentication()
    {
        // Instantiate the MockDatabase class with sample data
        $mockData = array(
            array('emailid' => 'admin@example.com', 'pass1' => 'adminpass'),
            // Add more sample data as needed
        );

        $mockDb = new MockDatabase($mockData);

        // Instantiate the AdminAuthentication class with the mock database
        $adminAuthentication = new AdminAuthentication($mockDb);

        // Use the authentication method with invalid credentials
        $result = $adminAuthentication->authenticate('admin@example.com', 'wrongpassword');

        // Assert that the authentication fails
        $this->assertEquals(false,$result);
    }
    
}