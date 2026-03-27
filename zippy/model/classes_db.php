<?php
require_once('database.php');

function get_all_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function add_class($class) {
    global $db;
    $query = 'INSERT INTO classes (Class) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($id) {
    global $db;
    $query = 'DELETE FROM classes WHERE ID = :id';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
        return true;
    } catch (PDOException $e) {
        throw new Exception("Cannot delete class that is in use.");
    }
}
?>