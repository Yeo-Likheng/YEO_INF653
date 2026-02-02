<?php
    // Create and assign value to price and discount variable
    $price = 50;
    $discount = 10;
    /* 
        Create finalPrice variable to store final price after the discount
        by minus the price with discount value
    */
    $finalPrice = $price - $discount;
    # Display the total price after discount
    echo "Total price: $" . $finalPrice;
?>