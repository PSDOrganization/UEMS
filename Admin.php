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
<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Dashboard | By Code Info</title>
      <link rel="stylesheet" href="css/style2.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
      <div class="container">
        <nav>
          <ul>
            <li><a href="Admin.php" class="logo">
              <img src="images/plus.png" alt="">
              <span class="nav-item">DashBoard</span>
            </a></li>
            <li><a href="Admin.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a></li>
            <li><a href="create_event.php">
                <i class="fas fa-calendar-plus"></i>
              <span class="nav-item">Create Event</span>
            </a></li>
            <li><a href="update_event.php">
              <i class="fas fa-wallet"></i>
              <span class="nav-item">Update Event</span>
            </a></li>
            <li><a href="delete_event.php">
                <i class="fas fa-trash-alt"></i>
              <span class="nav-item">Delete Event</span>
            </a></li>
            <li><a href="explore_events.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">View Events</span>
            </a></li>
            <li><a href="view_parti.php">
                <i class="fas fa-users"></i>
              <span class="nav-item">View Paricipants</span>
            </a></li>
            <li><a href="view_parti.php">
                <i class="fas fa-users"></i>
              <span class="nav-item">View Volunteers</span>
            </a></li>
            <li><a href="contact.html">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Contact Us</span>
            </a></li>
            <li><a href="logout.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
          </ul>
        </nav>
    
        <section class="main">
          <div class="main-top">
            <h1>Event Management</h1>
            <i class="fas fa-user-cog"><a href="#" class="logout"></a></i>
          </div>
          <div class="main-skills">
            <div class="card">
              <i class="fas fa-calendar-plus"></i>
              <h3>Create Events</h3>
              <p>Publish events !</p>
              <a href="create_event.php"><button>Create Event</button></a>
              
            </div>
            <div class="card">
              <i class="fas fa-wallet"></i>
              <h3>Update Event</h3>
              <p>Update the event details!!</p>
              <a href="update_event.php"><button>Update Event</button></a>
            </div>
            <div class="card">
              <i class="fas fa-trash-alt"></i>
              <h3>Delete Event</h3>
              <p>Delete events!!</p>
              <a href="delete_event.php"><button>Delete Event</button></a>
            </div>
           
          </div>
    
          <section class="main-course">
            <h1>View Events created and Particpants of Events</h1>
            <div class="course-box">
              <ul>
                <li class="active">In progress</li>
                
              </ul>
              <div class="course">
                <div class="box">
                  <h3>View Events</h3>
                  <p>Events Craeted by you</p>
                  <a href="explore_events.php"><button>View</button></a>
                  
                </div>
                <div class="box">
                  <h3>Views Particpants</h3>
                  <p>Partcicpants of events created by you</p>
                  <a href="view_parti.php"><button>View</button></a>
                </div>

                <div class="box">
                  <h3>Views Volunteers</h3>
                  <p>Volunteers who have registered to help in Organizing the events</p>
                  <a href="View_Volunteers.php"><button>View</button></a>
                </div>
              </div>
            </div>
          </section>
        </section>
      </div>
    </body>
  </html>
</span>
<?php
}
ob_end_flush();
?>
