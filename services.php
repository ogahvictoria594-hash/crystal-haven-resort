<?php
// include database connection so we can fetch all services
require "config/db-connect.php";

// get all services from database, ordered by ID
$stmt = $pdo->prepare("SELECT * FROM services ORDER BY id ASC");
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- page title -->
  <title>Our Services | Crystal Haven Resort</title>
  <!-- bootstrap css -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <style>
    /* basic page colors */
    body { background-color: #121212; color: white; }

    /* navbar custom background */
    .navbar-custom { background-color: #1c1c1c; }

    /* card styling */
    .card {
      background-color: #1e1e1e;
      border: 1px solid gold;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* hover effect for cards */
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }

    /* gold button style */
    .btn-gold {
      background-color: gold;
      color: black;
      font-weight: 600;
      border: none;
      transition: 0.3s;
    }

    /* hover effect for gold button */
    .btn-gold:hover {
      background-color: #e6b800;
      color: white;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
  <div class="container">
    <!-- brand -->
    <a class="navbar-brand fw-bold text-warning" href="index.php">Crystal Haven</a>
    <!-- hamburger menu for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- navbar links -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-warning" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="rooms.php">Rooms</a></li>
        <!-- highlight current page -->
        <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="about.php">About</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- main container -->
<div class="container py-5">
  <!-- page heading -->
  <h1 class="text-center fw-bold text-warning mb-5">Our Exclusive Services</h1>
  
  <div class="row g-4">
    <?php 
    // check if we got any services
    if (!empty($services)) {
      // loop through each service
      foreach ($services as $service) { 
    ?>
        <div class="col-md-4">
          <div class="card h-100 text-center">
            <!-- service image -->
            <img src="assets/images/<?php echo $service['image_path']; ?>" 
                 class="card-img-top" 
                 alt="<?php echo $service['service_name']; ?>"
                 style="height: 220px; object-fit: cover;">
            <div class="card-body">
              <!-- service name -->
              <h5 class="card-title text-warning fw-bold"><?php echo $service['service_name']; ?></h5>
              <!-- service description -->
              <p class="card-text text-white-50"><?php echo $service['description']; ?></p>
              <!-- button links to service details page -->
              <a href="service.php?id=<?php echo $service['id']; ?>" class="btn btn-gold mt-2">View Details</a>
            </div>
          </div>
        </div>
    <?php 
      } // end foreach
    } else {
      // show message if no services found
      echo "<p class='text-center text-danger'>No services available at the moment.</p>";
    }
    ?>
  </div>
</div>

<!-- bootstrap JS -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
