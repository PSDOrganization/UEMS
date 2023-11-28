<?php
ob_start();
// Database class for database connection and interaction
class Database
{
    private $connection;
 
    public function __construct($hostname, $username, $password, $databaseName)
    {
        $this->connection = mysqli_connect($hostname, $username, $password, $databaseName);
        if (!$this->connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }
 
    public function executeQuery($query)
    {
        return mysqli_query($this->connection, $query);
    }
 
    public function closeConnection()
    {
        mysqli_close($this->connection);
    }
}
 
// Event class for managing events
class EventManager
{
    private $db;
 
    public function __construct(Database $database)
    {
        $this->db = $database;
    }
 
    public function updateEvent($eventid, $eventname, $noofparticipants, $eventdescription, $event_date, $event_time, $venue, $targetPath, $newFileName)
    {
        $query = "UPDATE event SET eventname='$eventname', noofparticipants='$noofparticipants', eventdescription='$eventdescription', event_date='$event_date', event_time='$event_time', venue='$venue', imagepath='$targetPath', filename='$newFileName' WHERE eventid='$eventid'";
        $result = $this->db->executeQuery($query);
 
        if ($result) {
            echo "Record updated successfully";
            exit(header("refresh:1;url=Admin.php"));
        } else {
            die("Error updating record: " . mysqli_error($this->db->connection));
        }
    }
}
 
// Instantiate the Database class
$db = new Database('mysql-container', 'root', '', 'uems');
 
// Instantiate the EventManager class
$eventManager = new EventManager($db);
 
// User input data
$eventid = $_POST['eventid'];
$eventname = $_POST['eventname'];
$noofparticipants = $_POST['noofparticipants'];
$eventdescription = $_POST['eventdescription'];
$event_date = $_POST['event_date'];
$event_time = $_POST['event_time'];
$venue = $_POST['venue'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      // Get file information
      $fileName = $_FILES['image']['name'];
      $fileType = $_FILES['image']['type'];
      $fileTempName = $_FILES['image']['tmp_name'];
      $fileSize = $_FILES['image']['size'];
  
      // Check file type and size
      if ($fileSize > 0 && in_array($fileType, ['image/jpeg', 'image/png', 'image/gif'])) {
        // Generate a unique file name
        $newFileName = md5(uniqid()) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
  
        // Move the uploaded file to the desired location
        $targetPath = 'uploads/' . $newFileName;
        if (move_uploaded_file($fileTempName, $targetPath)) {  
          // Success message
          echo 'Image uploaded successfully!';
        } else {
          echo 'Error moving uploaded file.';
        }
      } else {
        echo 'Invalid file type or size.';
      }
    } else {
      echo 'Error uploading file.';
    }
} 
// Update the event
$eventManager->updateEvent($eventid, $eventname, $noofparticipants, $eventdescription, $event_date, $event_time, $venue, $targetPath, $newFileName);
 
// Close the database connection
$db->closeConnection();
ob_end_flush();
?>