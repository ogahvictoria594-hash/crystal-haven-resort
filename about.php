<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - Crystal Haven Resort</title>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">


<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning">
  <div class="container">
    <a class="navbar-brand text-warning fw-bold" href="index.php">Crystal Haven Resort</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="rooms.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link active text-warning fw-semibold" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>


<section class="position-relative">
  <img src="assets/images/hotel.jpg" class="img-fluid w-100" style="height:450px; object-fit:cover; filter:brightness(70%);">
  <div class="position-absolute top-50 start-50 translate-middle text-center">
    <h1 class="text-warning fw-bold display-4">About Crystal Haven Resort</h1>
    <p class="lead text-light">Where comfort meets elegance</p>
  </div>
</section>


<div class="container my-5">
  <div class="card bg-black text-white border-0 shadow-lg mb-4">
    <div class="card-body">
      <h2 class="text-warning">Our Story</h2>
      <p class="mt-3">
        Founded in 2010, Crystal Haven Resort began as a peaceful hideaway for travelers seeking escape from city noise.
        Over the years, it has grown into a luxury retreat where guests are welcomed with warmth, comfort, and elegance.
        Every corner reflects our passion for hospitality and our promise to make each stay unforgettable.
      </p>
    </div>
  </div>

  <div class="card bg-black text-white border-0 shadow-lg mb-4">
    <div class="card-body">
      <h2 class="text-warning">Our Mission</h2>
      <p class="mt-3">
        Our mission is to create experiences that stay in your heart. From the peaceful spa to our rooftop lounge,
        every space blends nature, comfort, and luxury — all designed to help you unwind and reconnect with what matters.
      </p>
    </div>
  </div>

  <div class="card bg-black text-white border-0 shadow-lg">
    <div class="card-body">
      <h2 class="text-warning">Our Vision</h2>
      <p class="mt-3">
        We see Crystal Haven Resort as a place that inspires. Our goal is to become one of the most beloved destinations
        in the world — a resort that feels like home, where every guest leaves relaxed, happy, and inspired to return.
      </p>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="bg-black text-center text-secondary py-3 border-top border-secondary mt-5">
  <p class="mb-0">&copy; <?php echo date("Y"); ?> Crystal Haven Resort. All Rights Reserved. |
  <a href="contact.php" class="text-warning text-decoration-none">Contact Us</a></p>
</footer>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
