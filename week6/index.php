<?php
    require_once('./model/database.php');
    require_once('./model/assignment_db.php');
    require_once('./model/course_db.php');

    $assignment_id = filter_input(INPUT_POST, 'assignment_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'assignment_id', FILTER_VALIDATE_INT);
    $description = filter_input(INPUT_POST, 'description', FILTER_UNSAFE_RAW);
    $courseName = filter_input(INPUT_POST, 'course_name', FILTER_UNSAFE_RAW);
    $course_id = filter_input(INPUT_POST, 'course_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
    $action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?: 'list_assignments'; // Fix 1: was 'list_assignment'

    switch($action){
        case 'list_courses':
            $courses = get_courses();
            include('view/course_list.php');
            break;
            
        case 'list_assignments':
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id); 
            include('view/assignment_list.php');
            break;
            
        case 'add_course':
            if ($courseName) {
                add_course($courseName);
            }
            $courses = get_courses();
            include('view/course_list.php');
            break;
            
        case 'add_assignment':
            if ($course_id && $description) {
                add_assignment($course_id, $description);
            }
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id); 
            include('view/assignment_list.php');
            break;
            
        case 'delete_assignment':
            if ($assignment_id) {
                delete_assignment($assignment_id);
            }
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id); 
            include('view/assignment_list.php');
            break;
            
        case 'delete_course':
            if ($course_id) {
                delete_course($course_id);
            }
            $courses = get_courses();
            include('view/course_list.php');
            break;
            
        case 'edit_assignment':
            if ($assignment_id) {
                $assignment = get_assignment_by_id($assignment_id);
                $courses = get_courses();
                include('view/update_assignment.php');
            }
            break;
            
        case 'update_assignment':
            if ($assignment_id && $description && $course_id) {
                update_assignment($assignment_id, $description, $course_id);
            }
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id); 
            include('view/assignment_list.php');
            break;
            
        case 'edit_course':
            if ($course_id) {
                $course_edit = get_course_by_id($course_id);
                include('view/update_course.php');
            }
            break;
            
        case 'update_course':
            if ($course_id && $courseName) {
                update_course($course_id, $courseName);
            }
            $courses = get_courses();
            include('view/course_list.php');
            break;
            
        default:
            $courses = get_courses();
            $assignments = get_assignments_by_course($course_id); 
            include('view/assignment_list.php');
    }
?>