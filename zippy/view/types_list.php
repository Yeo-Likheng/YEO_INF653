<div class="list-container">
    <h3>Add Type</h3>
    <form method="post" action="/zippy/controllers/types.php" class="add-form">
        <input type="hidden" name="action" value="add_type">
        <input type="text" name="type" placeholder="Enter Type" required>
        <input type="submit" value="Add Type">
    </form>

    <h3>Existing Types</h3>
    <div class="cards-container">
        <?php foreach ($types as $type): ?>
        <div class="small-card">
            <span><?php echo htmlspecialchars($type['Type']); ?></span>
            <a href="/zippy/controllers/types.php?action=delete_type&id=<?php echo $type['ID']; ?>" 
               class="delete-btn" onclick="return confirm('Delete this type?');">Delete</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>