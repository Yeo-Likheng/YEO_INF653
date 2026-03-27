<?php
require_once('database.php');


function get_vehicles($sort = 'price', $filter_type = null, $filter_id = null, $make_id = null, $type_id = null, $class_id = null) {
    global $db;

    $order_by = ($sort == 'year') ? 'v.year DESC' : 'v.price DESC';

    $query = "
        SELECT v.ID, v.year, v.model, v.price,
               t.Type, c.Class, m.Make
        FROM   vehicles v
        JOIN   types   t ON v.type_id  = t.ID
        JOIN   classes c ON v.class_id = c.ID
        JOIN   makes   m ON v.make_id  = m.ID
        WHERE 1=1
    ";

    $params = [];

    
    if ($filter_type && $filter_id) {
        if ($filter_type == 'make'){ 
            $query .= " AND v.make_id  = :filter_id"; 
        }
        elseif ($filter_type == 'type'){ 
            $query .= " AND v.type_id  = :filter_id"; 
        }
        elseif ($filter_type == 'class'){ 
            $query .= " AND v.class_id = :filter_id"; 
        }
        $params[':filter_id'] = $filter_id;
    }

    
    if ($make_id){ 
        $query .= " AND v.make_id  = :make_id";  $params[':make_id']  = $make_id;  
    }
    if ($type_id){ 
        $query .= " AND v.type_id  = :type_id";  $params[':type_id']  = $type_id;  
    }
    if ($class_id){ 
        $query .= " AND v.class_id = :class_id"; $params[':class_id'] = $class_id; 
    }

    $query .= " ORDER BY $order_by";

    $statement = $db->prepare($query);
    $statement->execute($params);
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;

    $query = '
        INSERT INTO vehicles 
        (year, model, price, type_id, class_id, make_id)
        VALUES 
        (:year, :model, :price, :type_id, :class_id, :make_id)
    ';

    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year, PDO::PARAM_INT);
    $statement->bindValue(':model', $model, PDO::PARAM_STR);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    $statement->bindValue(':class_id', $class_id, PDO::PARAM_INT);
    $statement->bindValue(':make_id', $make_id, PDO::PARAM_INT);

    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($id) {
    global $db;

    $query = 'DELETE FROM vehicles WHERE id = :id';

    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}


?>