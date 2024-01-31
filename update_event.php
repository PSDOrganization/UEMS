<?php
ob_start();
session_start();

// Check if the user is logged in
if (!isset($_SESSION['Alogged_in']) || $_SESSION['Alogged_in'] !== true) {
    // Redirect to the login page or show an access denied message
    echo 'login to view admin dashboard';
    header("Location: login.html");
    exit();
}
if (isset($_SESSION["Alogged_in"]) || $_SESSION["Alogged_in"] === true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up Page</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for the sign-up page */
        body {
            background-color: #f8f9fa;
        }

        .signup-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', (event) => {
        event.preventDefault();

        // Handle file upload
        const file = event.target.elements.image.files[0];
        if (file) {
            // Send the file to the server using AJAX
            const formData = new FormData();
            formData.append('image', file);

            fetch('updeve.php', {
            method: 'POST',
            body: formData
            })
            .then(response => response.json())
            .then(data => {
            console.log('Image uploaded successfully!');
            })
            .catch(error => {
            console.error('Error uploading image:', error);
            });
        }
        });
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 signup-container">
                <h2 class="text-center mb-4">Update Event</h2>
                <form id="form" action="updeve.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="eventId">Event Id</label>
                            <input type="text" class="form-control" id="eventId" placeholder="Enter the event Id" name="eventid" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="eventName">Event Name</label>
                            <input type="text" class="form-control" id="eventName" placeholder="Enter the event name" name="eventname" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="noofparticipants">No of Participants</label>
                            <input type="text" class="form-control" id="noofparticipants" placeholder="Enter the number of participants" name="noofparticipants" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="eventName">Event Description</label>
                        <input type="text" class="form-control" id="eventdescription" placeholder="Enter the event description" name="eventdescription" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" placeholder="Enter the date" name="event_date" required>
                    </div>
					<div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" placeholder="Enter the time" name="event_time" required>
                    </div>
					<div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text" class="form-control" id="venue" placeholder="Enter the venue" name="venue" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Event Poster</label>
                        <input type="file" class="btn btn-primary btn-block" name="image" required>
                        <br></br>
                        <button type="submit" class="btn btn-primary btn-block">Update Event</button>
                    </div>
                    <!--<button type="submit" class="btn btn-primary btn-block">Update Event</button>-->
                </form>
                
            </div>
        </div>
       <p>

       </p>
    </div>

	
    <!-- Link to Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
<?php
}
ob_end_flush();
?>