<?php
require "config/db-connect.php"; // Include database connection ($pdo)

// Get all rooms from the database, ordered by newest first
$stmtRooms = $pdo->prepare("SELECT * FROM rooms ORDER BY id DESC");
$stmtRooms->execute();
$rooms = $stmtRooms->fetchAll(PDO::FETCH_ASSOC); // Fetch all rooms as associative array
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel | Crystal Haven Resort</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<style>
/* General dark theme styles */
body { background-color: #000; color: #fff; }

/* Gold text style for headings */
.text-gold { color: gold !important; }

/* Gold button styling */
.btn-gold {
    background-color: gold;
    color: black;
    font-weight: 600;
    border: none;
}
.btn-gold:hover {
    background-color: #e6b800;
    color: white;
}

/* Card styling for admin content */
.card { background-color: #111; color: #fff; }
</style>
</head>
<body>

<div class="container py-5">
    <!-- Admin Panel Heading -->
    <h1 class="text-gold mb-4 text-center fw-bold">Admin Panel</h1>

    <!-- Form to add a new room -->
    <div class="card p-4 mb-5 shadow-sm border border-secondary">
        <h4 class="text-gold mb-3">Add New Room</h4>
        <form action="add-room.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <!-- Room name input -->
                <div class="col-md-6">
                    <label class="form-label">Room Name</label>
                    <input type="text" name="room_name" class="form-control" required>
                </div>

                <!-- Room type input -->
                <div class="col-md-6">
                    <label class="form-label">Room Type</label>
                    <input type="text" name="type" class="form-control" required>
                </div>

                <!-- Room price input -->
                <div class="col-md-6">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <!-- Room image upload -->
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <!-- Room description textarea -->
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>
            </div>

            <!-- Submit button -->
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-gold px-4">Add Room</button>
            </div>
        </form>
    </div>

    <!-- Section showing all existing rooms -->
    <h4 class="text-gold mb-3 fw-semibold">Existing Rooms</h4>
    <div class="row">
    <?php
    // Loop through all rooms fetched from database
    foreach ($rooms as $room) {
        $id = $room['id'];
        $name = $room['room_name'];
        $price = $room['price_per_night'];
        $image = $room['featured_image'];

        echo '<div class="col-md-6 col-lg-4 mb-4">';
        echo '<div class="card h-100 border-0 shadow">';

        // Room image
        echo '<img src="assets/images/'.$image.'" class="card-img-top" alt="'.$name.'" style="height:200px; object-fit:cover;">';

        echo '<div class="card-body d-flex flex-column">';
        // Room name and price
        echo '<h5 class="card-title text-gold">'.$name.'</h5>';
        echo '<p class="mb-1"><strong>Price:</strong> ₦'.$price.'</p>';

        echo '<div class="mt-auto d-flex justify-content-start">';

        // Edit button
        echo '<a href="edit-room.php?id='.$id.'" class="btn btn-success btn-sm me-2">Edit</a>';

        // Delete form with confirmation
        echo '<form action="delete-room.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this room?\');">';
        echo '<input type="hidden" name="id" value="'.$id.'">';
        echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
        echo '</form>';

        echo '</div>'; // Close button container
        echo '</div>'; // Close card-body
        echo '</div>'; // Close card
        echo '</div>'; // Close column
    }
    ?>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 text-secondary small">
        © <?php echo date('Y'); ?> Crystal Haven Resort | Admin Panel
    </footer>

</div>

<!-- Bootstrap JS -->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
