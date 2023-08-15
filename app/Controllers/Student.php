<?php
namespace App\Controllers;


class Student {

    function details( $id ) {
        global $db;

        $stmt = $db->prepare("CALL GetStudentDetails(:student_id)");
        $stmt->bindParam(':student_id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();

        echo "Student ID : $id<br>";
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }

}