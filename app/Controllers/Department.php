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

    function index2() {
        // Load template library
        $templates = new \League\Plates\Engine('../templates');

        // fetch data from database using Model
        $dpt = new \App\Model\Department;
        $dept_data = $dpt->get_with_staffs();


        // $dept_array = [];
        // foreach($dept_data as $d) {
        //     if(!isset( $dept_array[ $d['dept_id'] ] )) {
        //         $dept_array[ $d['dept_id'] ] = $d;
        //         $dept_array[ $d['dept_id'] ]['staffs'] = [];
        //     }
        //     $dept_array[ $d['dept_id'] ]['staffs'][] = $d;
        // }

        // echo "<pre>";
        // print_r($dept_array);
        // echo "</pre>";
        // exit();


        // send data to template and render HTML
        echo $templates->render('departments', [ 
            'title' => 'Senarai Jabatan',
            'dept_data' => $dept_data
        ]);        
        
    }
}

