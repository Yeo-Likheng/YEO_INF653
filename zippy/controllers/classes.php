<?php
require_once('../model/database.php');
require_once('../model/classes_db.php');

$action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action');

try {
    if ($action == 'add_class') {
        $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($class) add_class($class);
        header("Location: ../admin/classes_list.php");
        exit();
    }

    if ($action == 'delete_class') {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) delete_class($id);
        header("Location: ../admin/classes_list.php");
        exit();
    }
} catch (Exception $e) {
    header("Location: ../admin/classes_list.php?error=" . urlencode($e->getMessage()));
    exit();
}
?>
