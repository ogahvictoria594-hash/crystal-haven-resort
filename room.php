<?php
// include the database connection so we can query rooms and images
require "config/db-connect.php";

// get the room id from the URL, or null if not set
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // prepare a query to get the specific room by id
    // using prepared statements for security (prevents SQL injection)
    $stmt = $pdo->prepare("SELECT * FROM rooms WHERE id = ?");
    $stmt->execute([$id]);
    $room = $stmt->fetch(PDO::FETCH_ASSOC); // fetch the room details as associative array

    // now get all additional images for this room from room_images table
    $stmtImages = $pdo->prepare("SELECT image_path FROM room_images WHERE room_id = ?");
    $stmtImages->execute([$id]);
    $roomImages = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

    // if there are no extra images, just use the featured image
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

<!-- linking bootstrap CSS -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<style>
/* slideshow container to hold all room images */
.slideshow-container {
  position: relative;
  width: 100%;
  height: 500px; /* fixed height so layout stays consistent */
  border-radius: 10px;
  overflow: hidden;
  margin-bottom: 20px;
}

/* all images stacked on top of each other */
.slide-image {
  width: 100%;
  height: 100%;
  object-fit: cover; /* ensures image covers entire container without stretching */
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0; /* hidden by default */
  transition: opacity 1s; /* smooth fade effect */
}

/* show only the active slide */
.slide-image.active {
  opacity: 1;
}
</style>
</head>
<body class="bg-black text-white">

<!-- main navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-warning">
  <div class="container">
    <!-- logo -->
    <a class="navbar-brand text-warning fw-bold" href="index.php">Crystal Haven</a>
    <!-- mobile hamburger menu -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- navbar links -->
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

<!-- container for room details -->
<div class="container py-5">
<?php if (!empty($room)) { ?>
  <div class="row mb-4">
    
    <!-- left side: slideshow -->
    <div class="col-md-6 mb-4">
      <div class="slideshow-container">
        <?php
        $first = true; // flag to mark the first image as active
        foreach ($roomImages as $index => $img) {
            $activeClass = $first ? "active" : "";
            echo '<img src="' . $img['image_path'] . '" class="slide-image ' . $activeClass . '" alt="' . $room['room_name'] . '">';
            $first = false; // only first image is active
        }
        ?>
      </div>
    </div>

    <!-- right side: room info -->
    <div class="col-md-6">
      <!-- room name -->
      <h1 class="text-warning fw-bold"><?php echo $room['room_name']; ?></h1>
      <!-- type and price -->
      <p class="lead text-light"><?php echo $room['room_type']; ?> | <?php echo $room['price_per_night']; ?> / night</p>

      <!-- room description box -->
      <div class="bg-dark p-4 rounded shadow mb-3">
        <h4 class="text-warning fw-bold mb-2">Room Description</h4>
        <p class="text-light"><?php echo $room['description']; ?></p>
      </div>

      <!-- amenities list -->
      <div class="bg-dark p-4 rounded shadow">
        <h4 class="text-warning fw-bold mb-2">Amenities</h4>
        <ul class="text-light">
        <?php
        // split the amenities string into an array by comma
        $amenities = explode(",", $room['room_amenities']);
        foreach ($amenities as $item) {
            echo "<li>" . trim($item) . "</li>"; // trim whitespace
        }
        ?>
        </ul>
      </div>
    </div>
  </div>

  <!-- booking form -->
  <div class="bg-dark p-4 rounded shadow">
    <h4 class="text-warning fw-bold mb-3 text-center">Book This Room</h4>
    <form action="https://formspree.io/f/xovpzkqw" method="POST">
      <!-- hidden input to send room name -->
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
  <!-- show error if room id not found -->
  <div class="alert alert-danger text-center mt-5">Room not found.</div>
<?php } ?>
</div>

<!-- bootstrap JS for navbar and other components -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
// simple slideshow logic
const slides = document.getElementsByClassName('slide-image');
let currentSlide = 0;

// change slides every 2 seconds
setInterval(function() {
  slides[currentSlide].classList.remove('active'); // hide current
  currentSlide = (currentSlide + 1) % slides.length; // next slide
  slides[currentSlide].classList.add('active'); // show next
}, 2000);
</script>

</body>
</html>
