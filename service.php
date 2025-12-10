<?php
// include the database connection so we can query services and images
require "config/db-connect.php";

// get the service id from URL, or 0 if not set
$serviceId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// redirect to main services page if no valid id
if ($serviceId <= 0) {
    header("Location: services.php");
    exit;
}

// get the service details from the database
$stmtService = $pdo->prepare("SELECT * FROM services WHERE id = ?");
$stmtService->execute(array($serviceId));
$service = $stmtService->fetch(PDO::FETCH_ASSOC);

// if service not found, show error and stop execution
if (!$service) {
    echo "<div class='container text-center mt-5 text-white'>Service not found.</div>";
    exit;
}

// get all images for this service
$stmtImages = $pdo->prepare("SELECT * FROM service_images WHERE service_id = ? ORDER BY id ASC");
$stmtImages->execute(array($serviceId));
$images = $stmtImages->fetchAll(PDO::FETCH_ASSOC);

// array to give nicer names for images instead of file names
$niceNames = array(
    'con1.jpg'=>'Grand Conference Hall','con2.jpg'=>'Main Hall','con3.jpg'=>'Executive Hall','con4.jpg'=>'Banquet Hall','con5.jpg'=>'Meeting Room',
    'meal1.jpg'=>'Continental Breakfast','meal2.jpg'=>'Gourmet Lunch',
    'gym1.jpg'=>'Fitness Zone','gym2.jpg'=>'Cardio Area','gym3.jpg'=>'Weight Room','gym4.jpg'=>'Yoga Studio','gym5.jpg'=>'Spa Lounge','gym6.jpg'=>'Sauna Room',
    'roof1.jpg'=>'Rooftop Lounge View','roof2.jpg'=>'Sunset Deck','roof3.jpg'=>'Open Terrace','roof4.jpg'=>'Skyline Seats','roof5.jpg'=>'Cocktail Corner',
    'cloth1.jpg'=>'Laundry Service 1','cloth2.jpg'=>'Laundry Service 2','cloth3.jpg'=>'Laundry Service 3','cloth4.jpg'=>'Laundry Service 4',
    'cin1.jpg'=>'Private Cinema 1','cin2.jpg'=>'Private Cinema 2','cin3.jpg'=>'Private Cinema 3','cin4.jpg'=>'Private Cinema 4',
    'bar1.jpg'=>'Luxury Bar 1','bar2.jpg'=>'Luxury Bar 2','bar3.jpg'=>'Luxury Bar 3','bar4.jpg'=>'Luxury Bar 4','bar5.jpg'=>'Luxury Bar 5',
    'swim1.jpg'=>'Poolside 1','swim2.jpg'=>'Poolside 2','swim3.jpg'=>'Poolside 3','swim4.jpg'=>'Poolside 4','swim5.jpg'=>'Poolside 5',
    'cake.jpg'=>'Wedding Cake','ice.jpg'=>'Ice Sculpture','ring.jpg'=>'Engagement Rings','jollof.jpg'=>'Jollof Rice','rice.jpg'=>'White Rice','burrito.jpg'=>'Burrito Platter',
    'food1.jpg'=>'Starter Platter','food2.jpg'=>'Main Course','food3.jpg'=>'Dessert Tray','food4.jpg'=>'Beverages','food5.jpg'=>'Fruit Basket',
    'wed.jpg'=>'Wedding Setup','wed2.jpg'=>'Ceremony Decoration','birthday.jpg'=>'Birthday Setup','event1.jpg'=>'Corporate Event','event2.jpg'=>'Anniversary Event','event3.jpg'=>'Gala Night','event4.jpg'=>'Party Event'
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- page title dynamically set to service name -->
<title><?php echo $service['service_name']; ?> - Crystal Haven</title>
<!-- bootstrap CSS -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color:#121212; color:white;">

<!-- main container -->
<div class="container py-5">

<!-- service name and description -->
<h2 class="text-center mb-3" style="color:gold;"><?php echo $service['service_name']; ?></h2>
<p class="text-center text-white-50 mb-5"><?php echo $service['description']; ?></p>

<div class="row g-4">
<?php
foreach ($images as $img) {
    // get image filename and display name
    $filename = $img['image_name'];
    $displayName = isset($niceNames[$filename]) ? $niceNames[$filename] : $filename;
    $cost = '$500'; // placeholder cost, can be dynamic later

    // check if image exists, else use placeholder
    $imgPath = $img['image_path'];
    if (!file_exists($imgPath) || empty($imgPath)) {
        $imgPath = 'assets/images/placeholder.jpg';
    }
?>
    <!-- individual image card -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card bg-dark text-white border-warning h-100 shadow-sm rounded-3">
            <!-- image -->
            <img src="<?php echo $imgPath; ?>" class="card-img-top" style="height:200px; object-fit:cover;">
            <div class="card-body text-center">
                <!-- display name for the image/service -->
                <h5 class="text-warning"><?php echo $displayName; ?></h5>
                
                <?php if ($serviceId == 9) {  ?>
                    <!-- for food orders, show cost and order form -->
                    <p>Cost: <?php echo $cost; ?></p>
                    <button class="order-button btn btn-warning w-100">Order Now</button>
                    <div class="order-form" style="display:none; margin-top:10px;">
                        <form action="https://formspree.io/f/xwpwgkvj" method="POST">
                            <input type="hidden" name="food_order" value="<?php echo $displayName; ?>">
                            <input type="text" name="name" placeholder="Full Name" class="form-control mb-2" required>
                            <input type="text" name="room_number" placeholder="Room Number" class="form-control mb-2" required>
                            <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
                            <button type="submit" class="btn btn-warning w-100">Submit</button>
                        </form>
                    </div>
                <?php } else { ?>
                    <!-- for other services, show view button with simple form -->
                    <button class="order-button btn btn-warning w-100">View</button>
                    <div class="order-form" style="display:none; margin-top:10px;">
                        <form action="https://formspree.io/f/xwpwgkvj" method="POST">
                            <input type="hidden" name="service_view" value="<?php echo $displayName; ?>">
                            <input type="text" name="name" placeholder="Full Name" class="form-control mb-2" required>
                            <input type="text" name="room_number" placeholder="Room Number" class="form-control mb-2" required>
                            <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
                            <button type="submit" class="btn btn-warning w-100">Send</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
</div> 

</div> <!-- end container -->

<!-- bootstrap JS -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
// JS to toggle display of order forms when button is clicked
let buttons = document.getElementsByClassName('order-button');
for (let i = 0; i < buttons.length; i++) {
    buttons[i].onclick = function() {
        let form = this.parentNode.getElementsByClassName('order-form')[0];
        // simple toggle logic
        if (form.style.display == 'block') {
            form.style.display = 'none';
        } else {
            form.style.display = 'block';
        }
    }
}
</script>

</body>
</html>
