<?php
require_once('database.php');

function get_all_types() {
    global $db;
    $query = 'SELECT * FROM types ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function add_type($type) {
    global $db;
    $query = 'INSERT INTO types (Type) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($id) {
    global $db;
    $query = 'DELETE FROM types WHERE ID = :id';
    try{
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    }catch(PDOException $e){
        throw new Exception("Cannot delete type that is in use.");
    }
    
}
?>