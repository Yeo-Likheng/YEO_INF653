<?php
    $mark = 85;
    echo "<pre>";
    echo "Input: " . $mark . "\n";
    if($mark >= 90){
        echo "A";
    }elseif($mark <= 89 || $mark >= 80){
        echo "B";
    }elseif($mark <= 79 || $mark >= 70){
        echo "C";
    }elseif($mark <= 69 || $mark >= 60){
        echo "D";
    }else{
        echo "F";
    }
    echo "<pre>";
?>