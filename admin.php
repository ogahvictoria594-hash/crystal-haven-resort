<?php
require "config/db-connect.php";


$stmtRooms = $pdo->prepare("SELECT * FROM rooms ORDER BY id DESC");
$stmtRooms->execute();
$rooms = $stmtRooms->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel | Crystal Haven Resort</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

<style>
body {
    background-color: #000;
    color: #fff;
}
.text-gold {
    color: gold !important;
}
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
.card {
    background-color: #111;
    color: #fff;
}
</style>
</head>
<body>

<div class="container py-5">
    <h1 class="text-gold mb-4 text-center fw-bold">Admin Panel</h1>

    
    <div class="card p-4 mb-5 shadow-sm border border-secondary">
        <h4 class="text-gold mb-3">Add New Room</h4>
        <form action="add-room.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Room Name</label>
                    <input type="text" name="room_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Room Type</label>
                    <input type="text" name="type" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>
            </div>
            <div class="mt-4 text-end">
                <button type="submit" class="btn btn-gold px-4">Add Room</button>
            </div>
        </form>
    </div>

   
    <h4 class="text-gold mb-3 fw-semibold">Existing Rooms</h4>
    <div class="row">
    <?php
    foreach ($rooms as $room) {
        $id = $room['id'];
        $name = $room['room_name'];
        $price = $room['price_per_night'];
        $image = $room['featured_image'];

        echo '<div class="col-md-6 col-lg-4 mb-4">';
        echo '<div class="card h-100 border-0 shadow">';
        echo '<img src="assets/images/'.$image.'" class="card-img-top" alt="'.$name.'" style="height:200px; object-fit:cover;">';
        echo '<div class="card-body d-flex flex-column">';
        echo '<h5 class="card-title text-gold">'.$name.'</h5>';
        echo '<p class="mb-1"><strong>Price:</strong> ₦'.$price.'</p>';
        echo '<div class="mt-auto d-flex justify-content-start">';

        
        echo '<a href="edit-room.php?id='.$id.'" class="btn btn-success btn-sm me-2">Edit</a>';

        
        echo '<form action="delete-room.php" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this room?\');">';
        echo '<input type="hidden" name="id" value="'.$id.'">';
        echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
        echo '</form>';

        echo '</div>'; 
        echo '</div>'; 
        echo '</div>'; 
        echo '</div>'; 
    }
    ?>
    </div>

    <footer class="text-center mt-5 text-secondary small">
        © <?php echo date('Y'); ?> Crystal Haven Resort | Admin Panel
    </footer>

</div>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>




