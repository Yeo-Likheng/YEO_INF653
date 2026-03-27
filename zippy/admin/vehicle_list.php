<div class="list-container">
    <h3>List of Vehicles</h3>
    <div class="cards-container">
        <?php foreach ($vehicles as $vehicle): ?>
        <div class="small-card">
            <strong><?php echo htmlspecialchars($vehicle['year'] . " " . $vehicle['model']); ?></strong>
            <p>Price: $<?php echo number_format($vehicle['price'], 2); ?></p>
            <p>Make: <?php echo htmlspecialchars($vehicle['Make']); ?></p>
            <p>Type: <?php echo htmlspecialchars($vehicle['Type']); ?></p>
            <p>Class: <?php echo htmlspecialchars($vehicle['Class']); ?></p>
            <?php if (isset($show_delete) && $show_delete): ?>
            <a href="../controllers/vehicles.php?action=delete_vehicle&id=<?php echo $vehicle['ID']; ?>" 
               class="delete-btn" onclick="return confirm('Delete this vehicle?');">Delete</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>