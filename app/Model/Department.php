<?php 

namespace App\Model;

class Department extends BaseModel {

    public $table = 'departments';

    function get_with_staffs() {
        $query = "SELECT departments.id AS dept_id, departments.name AS 
        dept_name, staffs.id AS emp_id, staffs.full_name, 
        staffs.position
        FROM departments
        LEFT JOIN staffs ON departments.id = staffs.department_id
        ORDER BY departments.id, staffs.id";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }    

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}