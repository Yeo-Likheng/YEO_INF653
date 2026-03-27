<?php
require_once('../model/database.php');
require_once('../model/types_db.php');

$action = filter_input(INPUT_POST, 'action') ?? filter_input(INPUT_GET, 'action');

try {
    if ($action == 'add_type') {
        $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($type) add_type($type);
        header("Location: ../admin/types_list.php");
        exit();
    }

    if ($action == 'delete_type') {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id) delete_type($id);
        header("Location: ../admin/types_list.php");
        exit();
    }
} catch (Exception $e) {
    header("Location: ../admin/types_list.php?error=" . urlencode($e->getMessage()));
    exit();
}
?>
