<?php
require_once('../model/database.php');
require_once('../model/makes_db.php');

$action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action');

if ($action == 'add_make') {
    $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_SPECIAL_CHARS);
    if ($make) {
        try {
            add_make($make);
        } catch (Exception $e) {
            echo "Error adding make: " . $e->getMessage();
            exit();
        }
    }
    header("Location: ../admin/makes_list.php");
    exit();
}

if ($action == 'delete_make') {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id) {
        try {
            delete_make($id);
        } catch (Exception $e) {
            header("Location: ../admin/makes_list.php?error=" . urlencode($e->getMessage()));
            exit();
        }
    }
    header("Location: ../admin/makes_list.php");
    exit();
}
?>
