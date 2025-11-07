<?php
require "config/db-connect.php";


$stmt = $pdo->prepare("SELECT * FROM services ORDER BY id ASC");
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services | Crystal Haven Resort</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <style>
    body { background-color: #121212; color: white; }
    .navbar-custom { background-color: #1c1c1c; }
    .card {
      background-color: #1e1e1e;
      border: 1px solid gold;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }
    .btn-gold {
      background-color: gold;
      color: black;
      font-weight: 600;
      border: none;
      transition: 0.3s;
    }
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
    <a class="navbar-brand fw-bold text-warning" href="index.php">Crystal Haven</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-warning" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="rooms.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link active text-warning fw-bold" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="about.php">About</a></li>
      </ul>
    </div>
  </div>
</nav>


<div class="container py-5">
  <h1 class="text-center fw-bold text-warning mb-5">Our Exclusive Services</h1>
  <div class="row g-4">

    <?php 
    if (!empty($services)) {
      foreach ($services as $service) { 
    ?>
        <div class="col-md-4">
          <div class="card h-100 text-center">
            <img src="assets/images/<?php echo $service['image_path']; ?>" 
                 class="card-img-top" 
                 alt="<?php echo $service['service_name']; ?>"
                 style="height: 220px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title text-warning fw-bold"><?php echo $service['service_name']; ?></h5>
              <p class="card-text text-white-50"><?php echo $service['description']; ?></p>
              <a href="service.php?id=<?php echo $service['id']; ?>" class="btn btn-gold mt-2">View Details</a>
            </div>
          </div>
        </div>
    <?php 
      }
    } else {
      echo "<p class='text-center text-danger'>No services available at the moment.</p>";
    }
    ?>

  </div>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

