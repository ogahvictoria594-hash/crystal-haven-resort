<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crystal Haven Resort</title>
 
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min">
</head>
<body class="bg-black text-white">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="#">Crystal Haven</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

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

  
  <section id="home" class="container text-center mt-5">
    <h1 class="display-4 fw-bold text-warning">Crystal Haven Resort</h1>
    <p class="lead w-75 mx-auto mb-4">
      Experience timeless luxury — where comfort, class, and serenity meet in one perfect escape.
    </p>
    <div class="text-center">
      <img src="assets/images/hotel.jpg" 
           alt="Crystal Haven Resort Exterior" 
           class="img-fluid rounded shadow mb-4 border border-warning" 
           style="max-height: 750px; object-fit: cover;"> 
      <div class="mt-3">
        <a href="rooms.php" class="btn btn-warning btn-lg fw-bold shadow-sm px-4 py-2" 
           style="border-radius: 10px; transition: all 0.2s ease;"
           onmousedown="this.style.transform='scale(0.95)';" 
           onmouseup="this.style.transform='scale(1)';">
          View Rooms
        </a>
      </div>
    </div>
  </section>

  
  <section id="about" class="container text-center my-5">
    <h2 class="text-warning mb-3">Welcome to Paradise</h2>
    <p class="fs-5">
      At <strong>Crystal Haven Resort</strong>, every moment is designed to inspire peace and luxury. 
      From our serene rooms to our fine dining and world-class facilities, 
      we promise you an unforgettable experience.
    </p>
  </section>

  
  <section id="services" class="container py-5">
    <h2 class="text-center mb-5 text-warning fw-bold">Our Premium Facilities</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Rooms">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Elegant Rooms</h5>
            <p class="card-text">Luxurious interiors and breathtaking views for unmatched relaxation.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="assets/images/conference.jpg" class="card-img-top" alt="Conference Hall">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Conference Halls</h5>
            <p class="card-text">Professional spaces for corporate gatherings and exclusive events.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="card bg-dark text-light border-0 h-100">
          <img src="assets/images/dining.jpg" class="card-img-top" alt="Restaurant">
          <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">Fine Dining</h5>
            <p class="card-text">Savor world-class cuisines crafted by renowned chefs in an elegant setting.</p>
          </div>
        </div>
      </div>

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

  

  <!-- Footer -->
  <footer class="bg-dark text-center text-white p-4 border-top border-warning">
    <h5 class="text-warning">Crystal Haven Resort</h5>
    <p class="mb-0">Luxury • Comfort • Elegance</p>
    <small>&copy; 2025 Crystal Haven Resort. All Rights Reserved.</small>
  </footer>

  
  <script src="assets/bootstrap/js/bootsrap.bundle.min"></script>


</body>
</html>
