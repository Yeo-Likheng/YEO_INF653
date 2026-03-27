<div class="list-container">
    <h3>Add Class</h3>
    <form method="post" action="/zippy/controllers/classes.php" class="add-form">
        <input type="hidden" name="action" value="add_class">
        <input type="text" name="class" placeholder="Enter Class" required>
        <input type="submit" value="Add Class">
    </form>

    <h3>Existing Classes</h3>
    <div class="cards-container">
        <?php foreach ($classes as $class): ?>
        <div class="small-card">
            <span><?php echo htmlspecialchars($class['Class']); ?></span>
            <a href="/zippy/controllers/classes.php?action=delete_class&id=<?php echo $class['ID']; ?>" 
               class="delete-btn" onclick="return confirm('Delete this class?');">Delete</a>
        </div>
        <?php endforeach; ?>
    </div>
</div>