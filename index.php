<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crystal Haven Resort</title>
 
  <!-- linking bootstrap css, should double-check path works -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min">
</head>
<body class="bg-black text-white">

  <!-- Navbar at top, sticky so it stays while scrolling -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning sticky-top">
    <div class="container">
      <!-- logo / brand name -->
      <a class="navbar-brand fw-bold text-warning" href="#">Crystal Haven</a>
      <!-- hamburger button for small screens -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- navbar links -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link text-warning" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link text-warning" href="rooms.php">Rooms</a></li>
          <li class="nav-item"><a class="nav-link text-warning" href="services.php">Services</a></li>
          <li class="nav-item"><a class="nav-link text-warning" href="contact.php">Contact</a></li>
          <li class="nav-item"><a class="nav-link text-warning" href="about.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Home / hero section -->
  <section id="home" class="container text-center mt-5">
    <!-- main heading -->
    <h1 class="display-4 fw-bold text-warning">Crystal Haven Resort</h1>
    <!-- tagline / intro text -->
    <p class="lead w-75 mx-auto mb-4">
      Experience timeless luxury — where comfort, class, and serenity meet in one perfect escape.
    </p>
    <div class="text-center">
      <!-- main image of hotel, rounded + shadow + border -->
      <img src="assets/images/hotel.jpg" 
           alt="Crystal Haven Resort Exterior" 
           class="img-fluid rounded shadow mb-4 border border-warning" 
           style="max-height: 750px; object-fit: cover;"> 
      <div class="mt-3">
        <!-- button linking to rooms page -->
        <a href="rooms.php" class="btn btn-warning btn-lg fw-bold shadow-sm px-4 py-2" 
           style="border-radius: 10px; transition: all 0.2s ease;"
           onmousedown="this.style.transform='scale(0.95)';" 
           onmouseup="this.style.transform='scale(1)';">
          View Rooms
        </a>
      </div>
    </div>
  </section>

  <!-- About section -->
  <section id="about" class="container text-center my-5">
    <!-- heading -->
    <h2 class="text-warning mb-3">Welcome to Paradise</h2>
    <!-- paragraph explaining resort vibe -->
    <p class="fs-5">
      At <strong>Crystal Haven Resort</strong>, every moment is designed to inspire peace and luxury. 
      From our serene rooms to our fine dining and world-class facilities, 
      we promise you an unforgettable experience.
    </p>
  </section>

  <!-- Services / facilities section -->
  <section id="services" class="container py-5">
    <h2 class="text-center mb-5 text-warning fw-bold">Our Premium Facilities</h2>
    <div class="row g-4">
      <!-- card for elegant rooms -->
      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Rooms">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Elegant Rooms</h5>
            <p class="card-text">Luxurious interiors and breathtaking views for unmatched relaxation.</p>
          </div>
        </div>
      </div>

      <!-- card for conference hall -->
      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="assets/images/conference.jpg" class="card-img-top" alt="Conference Hall">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Conference Halls</h5>
            <p class="card-text">Professional spaces for corporate gatherings and exclusive events.</p>
          </div>
        </div>
      </div>

      <!-- card for dining / restaurant -->
      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="assets/images/dining.jpg" class="card-img-top" alt="Restaurant">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Fine Dining</h5>
            <p class="card-text">Savor world-class cuisines crafted by renowned chefs in an elegant setting.</p>
          </div>
        </div>
      </div>

      <!-- card for fitness / spa -->
      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="https://images.unsplash.com/photo-1576678927484-cc907957088c?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Gym">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Fitness & Spa</h5>
            <p class="card-text">Stay active and refreshed with our state-of-the-art gym and tranquil spa.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer section -->
  <footer class="bg-dark text-center text-white p-4 border-top border-warning">
    <h5 class="text-warning">Crystal Haven Resort</h5>
    <p class="mb-0">Luxury • Comfort • Elegance</p>
    <small>&copy; 2025 Crystal Haven Resort. All Rights Reserved.</small>
  </footer>

  <!-- bootstrap JS, make sure file path is correct -->
  <script src="assets/bootstrap/js/bootsrap.bundle.min"></script>

</body>
</html>
