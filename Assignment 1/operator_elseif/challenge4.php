<?php
    $mark = 85;
    echo "<pre>";
    echo "Input: " . $mark . "\n";
    if($mark >= 90){
        echo "Output: You got a A!";
    }elseif($mark <= 89 || $mark >= 80){
        echo "Output: You got a B!";
    }elseif($mark <= 79 || $mark >= 70){
        echo "Output: You got a C!";
    }elseif($mark <= 69 || $mark >= 60){
        echo "Output: You got a D!";
    }else{
        echo "Output: You got a F!";
    }
    echo "<pre>";
?>