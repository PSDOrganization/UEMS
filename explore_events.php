<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>University Event Mangement System</title>

	<style>
		Table, th, td{
			margin-left: 300px;
			border: 3px solid darkgreen;
			width: 600px;
			height: 50px;
			border-collapse: collapse;

		}
		h1{
			margin-left: 500px;
		}
		.register-button {
    		color: white;
   			background-color: blue;
    		padding: 5px 10px;
    		text-decoration: none;
    		border-radius: 4px;
		}

		.register-button:hover {
   			 background-color: darkblue;
			 color: yellow;
		}
		</style>
	    




<body>



    

<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="uems navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">UniVibe<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsuems" aria-controls="navbarsuems" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsuems">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li >
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li><a class="nav-link" href="login.html">Admin Login</a></li>
        
                <li class="nav-item active"><a class="nav-link" href="explore_events.php">Explore events</a></li>
                <li><a class="nav-link" href="Student_login.html">Student Login</a></li>
                <li><a class="nav-link" href="contact.html">Contact us</a></li>
            </ul>

        
        </div>
    </div>
        
</nav>
<h1>Events List</h1>




    <table>
        <tr>
			<th style="width: 20%;"> <b>Event ID </b></th>
            <th style="width: 20%;"> <b>Event Name </b></th>
            <th style="width: 15%;"> <b>No. of Participants</th>
            <th style="width: 20%;">Event Time</th>
            <th style="width: 20%;">Event Date</th>
            <th style="width: 35%;">Venue</th>
		
        </tr>

        <?php
        // Connect to MySQL
        $con = mysqli_connect('localhost', 'root', '', 'uems');
        if (!$con) {
            die('Could not connect to MySQL: ' . mysqli_connect_error());
        }

        // Execute the SQL query
        $query = "SELECT eventid, eventname, noofparticipants, event_time, event_date, venue FROM event";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die('Query error: ' . mysqli_error($con));
        }

        // Fetch and display the events
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
			echo "<td style='color: black; font-weight: bold;'>" . $row['eventid'] . "</td>";
            echo "<td style='color: black; font-weight: bold;'>" . $row['eventname'] . "</td>";
            echo "<td style='color: black; font-weight: bold;'>" . $row['noofparticipants'] . "</td>";
            echo "<td style='color: black; font-weight: bold;'>" . $row['event_time'] . "</td>";
            echo "<td style='color: black; font-weight: bold;'>" . $row['event_date'] . "</td>";
            echo "<td style='color: black; font-weight: bold;'>" . $row['venue'] . "</td>";
	
            echo "</tr>";
        }

        // Close the MySQL connection
        mysqli_close($con);
        ?>
    </table>

		<!-- Start Upcoming Events Section -->
		<div class="upevents-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title"><b> UPCOMING EVENTS!!</b> </h2>
						<p class="mb-4">Join the exciting events happening in the Campus. View and register for mutiple events now.</p>
						<p><a href="index.html" class="btn">Register Now</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="upevents-item" href="index.html">
							<img src="images/pic_1.png" class="img-fluid upevents-thumbnail">
							<h3 class="upevents-title">Student Wellness</h3>
							<strong class="upevents-price">No Entry Fee</strong>

							<span class="icon-cross">
								<img src="images/plus.png" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="upevents-item" href="index.html">
							<img src="images/pic2.jpg" class="img-fluid upevents-thumbnail">
							<h3 class="upevents-title">Paint Event</h3>
							<strong class="upevents-price">$10.00</strong>

							<span class="icon-cross">
								<img src="images/plus.png" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 3 -->

					<!-- Start Column 4 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="upevents-item" href="index.html">
							<img src="images/pic5 - instasize.webp" class="img-fluid upevents-thumbnail">
							<h3 class="upevents-title">BasketBall Tournamnet</h3>
							<strong class="upevents-price">No Entry Fee</strong>

							<span class="icon-cross">
								<img src="images/plus.png" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 4 -->

				</div>
			</div>
		</div>
		<!-- End Upcoming Events Section -->
<!-- Start Footer Section -->
<footer class="footer-section">
			<div class="container relative">

				<div class="event-img">
					<img src="images/event_part.jpg" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to receive Mails about Upcoming Events</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">UniVibe<span>.</span></a></div>
						<p class="mb-4">This website helps students in registering and conducting events. Students can register or login to view all the club events and can register for multiple events and can check all the details of registered events.</p>


						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="about.html">About us</a></li>
									<li><a href="contact.html">Services</a></li>
									
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="contact.html">Support</a></li>
									<li><a href="Student_login.html">Clubs</a></li>
									
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="login.html">Admin Login</a></li>
									<li><a href="contact.html">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									
									<li><a href="Student_login.html">Volunteer</a></li>
									<li><a href="contact.html">Connect</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a>UniVibe.co</a>
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>



