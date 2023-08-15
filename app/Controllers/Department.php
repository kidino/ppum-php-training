<?php
namespace App\Controllers;

class Department {
    function index() {
        global $db;
        
        $query = "SELECT departments.id AS dept_id, departments.name AS 
        dept_name, staffs.id AS emp_id, staffs.full_name, 
        staffs.position
        FROM departments
        LEFT JOIN staffs ON departments.id = staffs.department_id
        ORDER BY departments.id, staffs.id";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }    
    
        $currentDept = null;
        $firstDept = true;
    
        // Fetch the results and display
        while ($row = $stmt->fetch()) {
            if ($currentDept !== $row['dept_id']) {
                if (!$firstDept) {
                    echo "<br>";
                }
                echo "<h2>Department Name: " . $row['dept_name'] . "</h2>";
                echo "Department ID: " . $row['dept_id'] . "<br>";
                echo "<strong>Employees:</strong><br>";
                $currentDept = $row['dept_id'];
                $firstDept = false;
            }
    
            echo "- Employee ID: " . $row['emp_id'] . " | Name: " . $row['full_name'] . " | Position: " . $row['position'] . "<br>";
        }
    }
}

