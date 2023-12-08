<?php
ob_start();
// Iterator interface for iterating over query results
interface IteratorInterface
{
    public function hasNext();

    public function getNext();
}

// Concrete implementation of Iterator for mysqli results
class MysqliIterator implements IteratorInterface
{
    private $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function hasNext()
    {
        return $row = mysqli_fetch_assoc($this->result);
    }

    public function getNext()
    {
        return $row;
    }
}

// Decorator interface for adding additional functionality
interface EventManagerDecorator
{
    public function deleteEvent($eventid);
}

// Concrete implementation of EventManagerDecorator for logging
class LoggingDecorator implements EventManagerDecorator
{
    private $eventManager;

    public function __construct(EventManager $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    public function deleteEvent($eventid)
    {
        echo "Deleting event with ID: $eventid\n";
        $this->eventManager->deleteEvent($eventid);
    }
}
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

    public function selectDatabase($databaseName)
    {
        return mysqli_select_db($this->connection, $databaseName);
    }

    public function executeQuery($query)
    {
        return mysqli_query($this->connection, $query);
    }

    public function getIterator($result)
    {
        return new MysqliIterator($result);
    }

    public function closeConnection()
    {
        mysqli_close($this->connection);
    }
}

// Event class for managing events
class EventManager implements EventManagerDecorator
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function deleteEvent($eventid)
    {
        // Delete participants associated with the event
        $deleteParticipantsQuery = "DELETE FROM participants WHERE eventid = '$eventid'";
        $resultParticipants = $this->db->executeQuery($deleteParticipantsQuery);

        if (!$resultParticipants) {
            die("Error deleting participants: " . mysqli_error($this->db->connection));
        }

        // Delete the event
        $deleteEventQuery = "DELETE FROM event WHERE eventid='$eventid'";
        $resultEvent = $this->db->executeQuery($deleteEventQuery);

        if ($resultEvent) {
            echo "Event and associated participants deleted successfully";
            exit(header("refresh:1;url=Admin.php"));
        } else {
            die("Error deleting event: " . mysqli_error($this->db->connection));
        }
    }
}

// Instantiate the Database class
$db = new Database('mysql-container', 'root', '', 'uems');

// Instantiate the EventManager class with LoggingDecorator
$eventManager = new LoggingDecorator(new EventManager($db));

// User input data
$eventid = $_POST['eventid'];

// Delete the event
$eventManager->deleteEvent($eventid);

// Close the database connection
$db->closeConnection();
ob_end_flush();
?>
