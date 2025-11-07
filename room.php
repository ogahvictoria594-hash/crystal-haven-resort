<?php
require "config/db-connect.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
  
  $stmt = $pdo->prepare("SELECT * FROM rooms WHERE id = ?");
  $stmt->execute([$id]);
  $room = $stmt->fetch(PDO::FETCH_ASSOC);

  
  $stmtImages = $pdo->prepare("SELECT image_path FROM room_images WHERE room_id = ?");
  $stmtImages->execute([$id]);
  $roomImages = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

  
  if (empty($roomImages)) {
    $roomImages[] = array('image_path' => "assets/images/rooms/" . $room['featured_image']);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($room['room_name']) ? $room['room_name'] : 'Room Details'; ?> | Crystal Haven Resort</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<style>
.slideshow-container {
  position: relative;
  width: 100%;
  height: 500px; 
  border-radius: 10px;
  overflow: hidden;
  margin-bottom: 20px;
}
.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 1s;
}
.slide-image.active {
  opacity: 1;
}
</style>
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
        <li class="nav-item"><a class="nav-link text-white" href="rooms.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="about.php">About</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-5">
<?php if (!empty($room)) { ?>
  <div class="row mb-4">
    
    <div class="col-md-6 mb-4">
      <div class="slideshow-container">
        <?php
        $first = true;
        foreach ($roomImages as $index => $img) {
            $activeClass = $first ? "active" : "";
            echo '<img src="' . $img['image_path'] . '" class="slide-image ' . $activeClass . '" alt="' . $room['room_name'] . '">';
            $first = false;
        }
        ?>
      </div>
    </div>

   
    <div class="col-md-6">
      <h1 class="text-warning fw-bold"><?php echo $room['room_name']; ?></h1>
      <p class="lead text-light"><?php echo $room['room_type']; ?> | <?php echo $room['price_per_night']; ?> / night</p>

      <div class="bg-dark p-4 rounded shadow mb-3">
        <h4 class="text-warning fw-bold mb-2">Room Description</h4>
        <p class="text-light"><?php echo $room['description']; ?></p>
      </div>

      <div class="bg-dark p-4 rounded shadow">
        <h4 class="text-warning fw-bold mb-2">Amenities</h4>
        <ul class="text-light">
        <?php
        $amenities = explode(",", $room['room_amenities']);
        foreach ($amenities as $item) {
            echo "<li>" . trim($item) . "</li>";
        }
        ?>
        </ul>
      </div>
    </div>
  </div>

  
  <div class="bg-dark p-4 rounded shadow">
    <h4 class="text-warning fw-bold mb-3 text-center">Book This Room</h4>
    <form action="https://formspree.io/f/xovpzkqw" method="POST">
      <input type="hidden" name="room" value="<?php echo $room['room_name']; ?>">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Check-in</label>
          <input type="date" name="checkin" class="form-control" required>
        </div>
        <div class="col-md-3">
          <label class="form-label">Check-out</label>
          <input type="date" name="checkout" class="form-control" required>
        </div>
        <div class="col-12 text-center mt-3">
          <button type="submit" class="btn btn-warning fw-bold px-4">Book Now</button>
        </div>
      </div>
    </form>
  </div>

<?php } else { ?>
  <div class="alert alert-danger text-center mt-5">Room not found.</div>
<?php } ?>
</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

const slides = document.getElementsByClassName('slide-image');
let currentSlide = 0;

setInterval(function() {
  slides[currentSlide].classList.remove('active');
  currentSlide = (currentSlide + 1) % slides.length;
  slides[currentSlide].classList.add('active');
}, 2000);
</script>

</body>
</html>







