<?php
require_once('../model/database.php');
require_once('../model/types_db.php');

$types = get_all_types();
$error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Types - Zippy Used Autos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1 style="color:black">Manage Types</h1>

        <div class="admin-nav">
            <a href="index.php"        class="nav-btn">Back to Vehicles</a>
            <a href="makes_list.php"   class="nav-btn">Manage Makes</a>
            <a href="classes_list.php" class="nav-btn">Manage Classes</a>
            <a href="add_vehicle.php" class="nav-btn">Add Vehicle</a>
        </div>

        <?php include('../view/types_list.php'); ?>
        <?php if ($error): ?>
            <script>
                window.onload = function() {
                    alert("Error: <?php echo addslashes($error); ?>");
                    window.history.replaceState({}, document.title, window.location.pathname);
                };
            </script>
        <?php endif; ?>
    </div>
</body>
</html>
