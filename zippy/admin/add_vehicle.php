<?php
require_once('../model/database.php');
require_once('../model/makes_db.php');
require_once('../model/types_db.php');
require_once('../model/classes_db.php');

$makes   = get_all_makes();
$types   = get_all_types();
$classes = get_all_classes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Classes - Zippy Used Autos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1 style="color:black">Add Vehicle</h1>

        <div class="admin-nav">
            <a href="index.php"      class="nav-btn">Back to Vehicles</a>
            <a href="makes_list.php" class="nav-btn">Manage Makes</a>
            <a href="types_list.php" class="nav-btn">Manage Types</a>
            <a href="classes_list.php" class="nav-btn">Manage Classes</a>
        </div>
        <div class="list-container">
            <h3>Add Vehicle</h3>
            <form method="post" action="../controllers/vehicles.php" class="add-form">
                <input type="hidden" name="action" value="add_vehicle">
                <input type="number" name="year" placeholder="Year" required>
                <input type="text" name="model" placeholder="Model" required>
                <input type="number" step="0.01" name="price" placeholder="Price" required>

                <select name="make_id" required>
                    <option value="">Select Make</option>
                    <?php foreach ($makes as $make): ?>
                        <option value="<?php echo $make['ID']; ?>"><?php echo htmlspecialchars($make['Make']); ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="type_id" required>
                    <option value="">Select Type</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?php echo $type['ID']; ?>"><?php echo htmlspecialchars($type['Type']); ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="class_id" required>
                    <option value="">Select Class</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?php echo $class['ID']; ?>"><?php echo htmlspecialchars($class['Class']); ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" value="Add Vehicle">
            </form>
        </div>
    </div>
    
</body>
</html>