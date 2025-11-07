<?php
require "config/db-connect.php";


$query = "SELECT * FROM rooms";
$stmt = $pdo->query($query);
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crystal Haven Resort | Rooms</title>
 <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min">
</head>
<body class="bg-black text-white">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning">
    <div class="container">
      <a class="navbar-brand text-warning fw-bold" href="index.php">Crystal Haven</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-warning fw-bold" href="rooms.php">Rooms</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  
  <div class="container py-5">
    <h2 class="text-center text-warning mb-5 fw-bold">Our Rooms</h2>
    <div class="row">
      <?php
        foreach($rooms as $room){
          echo '
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card bg-dark text-white h-100 shadow">
              <img src="assets/images/'.$room["featured_image"].'" class="card-img-top" alt="'.$room["room_name"].'" style="height:300px; object-fit:cover; border-radius:10px;">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title text-warning">'.$room["room_name"].'</h5>
                <p class="card-text">'.substr($room["description"], 0, 80).'...</p>
                <p class="mb-2"><strong>Price:</strong> '.$room["price_per_night"].'</p>
                <a href="room.php?id='.$room["id"].'" class="btn btn-warning mt-auto fw-bold">View Details</a>
              </div>
            </div>
          </div>';
        }
      ?>
    </div>
  </div>

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
