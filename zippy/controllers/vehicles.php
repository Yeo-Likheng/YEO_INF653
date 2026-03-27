<?php
require_once('../model/database.php');
require_once('../model/vehicle_db.php');

$action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action');

try {
    // delete vehicle controller
    if ($action == 'delete_vehicle') {
        $vehicle_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($vehicle_id) {
            delete_vehicle($vehicle_id);
        }
        header("Location: ../admin/index.php");
        exit();
    }

    // add vehicle controller
    if ($action == 'add_vehicle') {
        $year     = filter_input(INPUT_POST, 'year',     FILTER_VALIDATE_INT);
        $model    = filter_input(INPUT_POST, 'model',    FILTER_SANITIZE_SPECIAL_CHARS);
        $price    = filter_input(INPUT_POST, 'price',    FILTER_VALIDATE_FLOAT);
        $type_id  = filter_input(INPUT_POST, 'type_id',  FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        $make_id  = filter_input(INPUT_POST, 'make_id',  FILTER_VALIDATE_INT);

        if ($year && $model && $price && $type_id && $class_id && $make_id) {
            add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
        }
        header("Location: ../admin/index.php");
        exit();
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
