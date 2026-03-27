<div class="list-container">
    <h3>Add Make</h3>
    <form method="post" action="/zippy/controllers/makes.php" class="add-form">
        <input type="hidden" name="action" value="add_make">
        <input type="text" name="make" placeholder="Enter Make" required>
        <input type="submit" value="Add Make">
    </form>

    <h3>Existing Makes</h3>
    <div class="cards-container">
        <?php foreach ($makes as $make): ?>
        <div class="small-card">
            <span><?php echo htmlspecialchars($make['Make']); ?></span>
            <a href="/zippy/controllers/makes.php?action=delete_make&id=<?php echo $make['ID']; ?>" 
               class="delete-btn" onclick="return confirm('Delete this make?');">Delete</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>