<?php
require_once('database.php');

function get_all_makes() {
    global $db;
    $query = 'SELECT * FROM makes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function add_make($make) {
    global $db;
    $query = 'INSERT INTO makes (Make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}

function delete_make($id) {
    global $db;
    $query = 'DELETE FROM makes WHERE ID = :id';
    try{
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $statement->closeCursor();
    }catch(PDOException $e){
        throw new Exception("Cannot delete make that is in use.");
    }
    
}
?>