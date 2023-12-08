<?php
ob_start();
$con = mysqli_connect('mysql-container', 'root', '');

if (!$con) {
    echo 'Not connected to server';
}

if (!mysqli_select_db($con, 'uems')) {
    echo 'database not selected';
}

// Check if the 'participants' table exists, and if not, create it
$createTableSQL = "CREATE TABLE IF NOT EXISTS participants (
    regisid INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) ,
    bannerid VARCHAR(255) NOT NULL,
    emailid VARCHAR(255) NOT NULL,
    eventid VARCHAR(255) NOT NULL,
    is_volunteer TINYINT(1) DEFAULT 0
)";


if ($con->query($createTableSQL) === TRUE) {
    echo "Table 'participants' created successfully or already exists.";
} else {
    echo "Error creating table: " . $con->error;
}

$fullname = $_POST['fullname'];
$bannerid = $_POST['bannerid'];
$emailid = $_POST['emailid'];
$eventid = $_POST['eventid'];

// Check if the 'volunteer' checkbox is checked
$is_volunteer = isset($_POST['volunteer']) ? 1 : 0;

$sql = "INSERT INTO participants (fullname, bannerid, emailid, eventid, is_volunteer) VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("sssss", $fullname, $bannerid, $emailid, $eventid, $is_volunteer);

if ($stmt->execute()) {
    // Registration successful, redirect to signup.html with a success message
    header("Location: Student_dash.php?success=Registration%20is%20successful");
} else {
    // Registration failed, redirect to signup.html with an error message
    header("Location: register.php?error=Registration%20failed");
}
ob_end_flush();
?>
