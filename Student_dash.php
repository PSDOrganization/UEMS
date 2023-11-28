<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to the login page or show an access denied message
    echo 'login to view admin dashboard';
    header("Location: Student_login.html");
    exit();
}
if (isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === true) {
?>    

<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Student Dashboard </title>
      <link rel="stylesheet" href="css/style2.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
      <div class="container">
        <nav>
          <ul>
            <li><a href="Student_Dashboard.html" class="logo">
              <img src="images/plus.png" alt="">
              <span class="nav-item">DashBoard</span>
            </a></li>
            <li><a href="index.html">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a></li>
            <li><a href="regis_events.php">
                <i class="fas fa-list-alt"></i>
              <span class="nav-item">Registered Events</span>
            </a></li>
            
            <li><a href="events_display.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">View Events</span>
            </a></li>
            
            <li><a href="contact.html">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Contact Us</span>
            </a></li>
            <li><a href="Student_login.html" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a></li>
          </ul>
        </nav>
    
        <section class="main">
          <div class="main-top">
            <h1>Student Dashboard</h1>
            <i class="fas fa-user-cog"><a href="Student_login.html" class="logout"></a></i>
          </div>
          <div class="main-skills">
            <div class="card">
              <i class="fas fa-calendar-plus"></i>
              <h3>Events Registered</h3>
              <p>Get the deatils of events registered by you!!</p>
              <a href="regis_events.php"><button>Registered events</button></a>
              
            </div>
            <div class="card">
              <i class="fas fa-wallet"></i>
              <h3>Contact US</h3>
              <p>Have any issues Contact US(24/7)!!</p>
              <a href="contact.html"><button>Help</button></a>
            </div>
            
           
          </div>
    
          <section class="main-course">
            <h1>All Events</h1>
            <div class="course-box">
              <ul>
                <li class="active">In progress</li>
                
              </ul>
              <div class="course">
                <div class="box">
                  <h3>View Events</h3>
                  <p>Published by Admin</p>
                  <a href="events_display.php"><button>All Events</button></a>
                  
                </div>
                
                
              </div>
            </div>
          </section>
        </section>
      </div>
    </body>
    </html></span>
<?php
}
?>