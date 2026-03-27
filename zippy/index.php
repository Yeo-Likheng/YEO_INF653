<?php
require_once('model/database.php');
require_once('model/vehicle_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/classes_db.php');

$sort     = filter_input(INPUT_GET, 'sort') ?: 'price';
$make_id  = filter_input(INPUT_GET, 'make_id',  FILTER_VALIDATE_INT) ?: null;
$type_id  = filter_input(INPUT_GET, 'type_id',  FILTER_VALIDATE_INT) ?: null;
$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT) ?: null;

$vehicles = get_vehicles($sort, null, null, $make_id, $type_id, $class_id);

$makes   = get_all_makes();
$types   = get_all_types();
$classes = get_all_classes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1 style="color:black">Zippy Used Autos</h1>

    <!-- Sort -->
    <div class="controls">
        <span>Sort by: </span>
        <a href="?sort=price&make_id=<?= $make_id ?>&type_id=<?= $type_id ?>&class_id=<?= $class_id ?>">Price</a> |
        <a href="?sort=year&make_id=<?= $make_id ?>&type_id=<?= $type_id ?>&class_id=<?= $class_id ?>">Year</a>
    </div>

    <!-- Combined Filters — all in one form, all submit together -->
    <form method="get" class="controls">
        <input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>">

        <label>Make:</label>
        <select name="make_id">
            <option value="">All Makes</option>
            <?php foreach ($makes as $make): ?>
                <option value="<?= $make['ID'] ?>" <?= $make_id == $make['ID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($make['Make']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Type:</label>
        <select name="type_id">
            <option value="">All Types</option>
            <?php foreach ($types as $type): ?>
                <option value="<?= $type['ID'] ?>" <?= $type_id == $type['ID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($type['Type']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Class:</label>
        <select name="class_id">
            <option value="">All Classes</option>
            <?php foreach ($classes as $class): ?>
                <option value="<?= $class['ID'] ?>" <?= $class_id == $class['ID'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($class['Class']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Filter" class="filter-btn">
        <a href="http://localhost/zippy/">Clear</a>
    </form>

    <?php include('view/vehicle_list.php'); ?>
</div>
</body>
</html>