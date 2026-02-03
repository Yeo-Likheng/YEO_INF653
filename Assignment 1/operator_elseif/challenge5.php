<?php
    $year = 2024;
    echo "<pre>";
    echo "Input: " . $year . "\n";
    if($year % 400 === 0 || ($year % 4 === 0 && $year % 100 !== 0)){
        echo "Output: {$year} is a leap year.";
    }else{
        echo "Output: {$year} is not a leap year.";
    }
    echo "<pre>";
?>