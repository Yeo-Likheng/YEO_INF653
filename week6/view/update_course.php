<?php
include('view/header.php');
?>

<section class="course-container">
    <h2>Update Course</h2>
    
    <?php if (!empty($course_edit)) : ?>
        <form action="." method="post">
            <input type="hidden" name="action" value="update_course">
            <input type="hidden" name="course_id" value="<?= htmlspecialchars($course_edit['courseID']) ?>">
            
            <div>
                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="course_name" value="<?= htmlspecialchars($course_edit['courseName']) ?>" maxlength="30" required>
            </div>
            
            <button type="submit">Update Course</button>
            <a href=".?action=list_courses">Cancel</a>
        </form>
    <?php else : ?>
        <p>Course not found.</p>
        <a href=".?action=list_courses">Back to Courses</a>
    <?php endif; ?>
</section>

<?php
include('view/footer.php');
?>
