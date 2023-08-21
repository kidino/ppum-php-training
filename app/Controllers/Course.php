<?php 

namespace App\Controllers;

class Course {

    public function details() {
        global $db;

        $query = "SELECT courses.title AS course_title, students.name AS student_name
        FROM courses
        INNER JOIN student_course ON courses.id = student_course.course_id
        INNER JOIN students ON student_course.student_id = students.id
        ORDER BY courses.title";

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Initialize variables to track course changes
        $currentCourse = null;
        $firstCourse = true;

        // Fetch and display the results
        while ($row = $stmt->fetch()) {
            if ($currentCourse !== $row['course_title']) {
                if (!$firstCourse) {
                    echo "<br>";
                }
                echo "<strong>Course Title: " . $row['course_title'] . "</strong><br>";
                echo "Students Enrolled:<br>";
                $currentCourse = $row['course_title'];
                $firstCourse = false;
            }
            echo "- $row[student_name]<br>";
        }

    }
}