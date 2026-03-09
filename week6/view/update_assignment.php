<?php
include('view/header.php');
?>

<section class="assignment-container">
    <h2>Update Assignment</h2>
    
    <?php if (!empty($assignment)) : ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="update_assignment">
            <input type="hidden" name="assignment_id" value="<?= htmlspecialchars($assignment['ID']) ?>">
            
            <div>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="<?= htmlspecialchars($assignment['Description']) ?>" required>
            </div>
            
            <div>
                <label for="course_id">Course:</label>
                <select id="course_id" name="course_id" required>
                    <option value="">Please select</option>
                    <?php foreach ($courses as $course) : ?>
                        <option value="<?= $course['courseID'] ?>" <?= $course['courseID'] == $assignment['courseID'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($course['courseName']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit">Update Assignment</button>
            <a href=".?action=list_assignments">Cancel</a>
        </form>
    <?php else : ?>
        <p>Assignment not found.</p>
        <a href=".?action=list_assignments">Back to Assignments</a>
    <?php endif; ?>
</section>

<?php
include('view/footer.php');
?>
