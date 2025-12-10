<?php
// include database connection file
// I put this at the top so we can use $pdo anywhere in this file
require "config/db-connect.php";

// select all rooms from the database
// I just want all the data for displaying on the rooms page
$query = "SELECT * FROM rooms";

// execute the query
$stmt = $pdo->query($query);

// fetch all rows as an associative array
// now $rooms contains every room with all columns, easy to loop through
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crystal Haven Resort | Rooms</title>

  <!-- linking Bootstrap CSS for styling -->
  <!-- I placed this in the head so all Bootstrap classes work -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min">
</head>
<body class="bg-black text-white">
  <!-- main navbar -->
  <!-- using navbar-dark because background is dark -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning">
    <div class="container">
      <!-- brand name, links back to home page -->
      <a class="navbar-brand text-warning fw-bold" href="index.php">Crystal Haven</a>

      <!-- hamburger menu button for mobile responsiveness -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navigation links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <!-- highlighting current page (Rooms) with text-warning -->
          <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-warning fw-bold" href="rooms.php">Rooms</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Rooms section -->
  <div class="container py-5">
    <!-- section title -->
    <h2 class="text-center text-warning mb-5 fw-bold">Our Rooms</h2>

    <div class="row">
      <?php
        // loop through each room in the database
        // using foreach because $rooms is an array
        foreach($rooms as $room){
          echo '
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-dark text-white h-100 shadow">
              <!-- display featured image -->
              <!-- using object-fit: cover so image fills card nicely without stretching -->
              <img src="assets/images/'.$room["featured_image"].'" class="card-img-top" alt="'.$room["room_name"].'" style="height:300px; object-fit:cover; border-radius:10px;">
              
              <div class="card-body d-flex flex-column">
                <!-- room title -->
                <h5 class="card-title text-warning">'.$room["room_name"].'</h5>
                
                <!-- short description -->
                <!-- substr limits the text to 80 characters so cards stay uniform -->
                <p class="card-text">'.substr($room["description"], 0, 80).'...</p>
                
                <!-- price per night -->
                <p class="mb-2"><strong>Price:</strong> '.$room["price_per_night"].'</p>
                
                <!-- link to detailed room page -->
                <!-- passing room id as GET parameter -->
                <a href="room.php?id='.$room["id"].'" class="btn btn-warning mt-auto fw-bold">View Details</a>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>

  <!-- bootstrap JS for dropdowns, navbar toggle, etc. -->
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
