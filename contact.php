<?php
require "config/db-connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - Crystal Haven Resort</title>
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#121212; color:white;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background-color:#1c1c1c;">
  <div class="container">
    <a class="navbar-brand text-gold fw-bold" href="index.php" style="color:gold;">Crystal Haven</a>
    <button class="navbar-toggler bg-gold" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="rooms.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link active text-gold fw-bold" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
      </ul>
    </div>
  </div>
</nav>


<section class="text-center py-5" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('assets/images/contact-hero.jpg') center/cover; color:white;">
  <div class="container">
    <h1 class="display-5 fw-bold text-gold">Get in Touch</h1>
    <p class="lead">We'd love to hear from you. Reach out and let's make your stay unforgettable.</p>
  </div>
</section>


<div class="container py-5">
  <div class="row g-4">
    
    <div class="col-lg-6">
      <div class="card border-0 shadow-lg p-4" style="background-color:#1c1c1c; border-radius:15px;">
        <h3 class="mb-4" style="color:white;">Send a Message</h3>
        <form action="https://formspree.io/f/mjkpqnpa" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control bg-dark text-white border-0" id="name" name="name" placeholder="Full Name" required>
            <label for="name" class="text-white">Full Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control bg-dark text-white border-0" id="email" name="email" placeholder="Email" required>
            <label for="email" class="text-white">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control bg-dark text-white border-0" id="phone" name="phone" placeholder="Phone">
            <label for="phone" class="text-white">Phone</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control bg-dark text-white border-0" placeholder="Message" id="message" name="message" style="height:120px;" required></textarea>
            <label for="message" class="text-white">Message</label>
          </div>
          <button type="submit" class="btn w-100 fw-bold" style="background-color:gold; color:black;">Send Message</button>
        </form>
      </div>
    </div>

    
    <div class="col-lg-6">
      <div class="card border-0 shadow-lg p-4" style="background-color:#1c1c1c; border-radius:15px;">
        <h3 class="text-gold mb-4">Contact Information</h3>
        <p style="color:white;"><strong>Address:</strong> 123 Crystal Lane, Paradise City</p>
        <p style="color:white;"><strong>Phone:</strong> +1 234 567 890</p>
        <p style="color:white;"><strong>Email:</strong> ogahvictoria@gmail.com</p>
        <p style="color:white;"><strong>Working Hours:</strong> Mon–Sun, 8:00 AM – 10:00 PM</p>
        <hr class="border-light">
        <div class="rounded overflow-hidden" style="height:300px;">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.959145112132!2d-74.0628273852407!3d4.710988342677568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f99abf5e008cb%3A0x7b0ff26a99d0a7b2!2sHotel!5e0!3m2!1sen!2sng!4v1699027397002!5m2!1sen!2sng" 
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center py-4 mt-5" style="background-color:#1c1c1c;">
  <p class="mb-0 text-white">&copy; <?php echo date('Y'); ?> Crystal Haven Resort. All Rights Reserved.</p>
</footer>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
