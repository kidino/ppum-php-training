<?php 

namespace App\Design; 

class Home {

    function index() {
        $templates = new \League\Plates\Engine('../templates');

        $emp = new \App\Model\Employee;
        $all_employees = $emp->get_all();

        echo $templates->render('home', [ 
            'title' => 'Kursus Intermediate PHP di KelasProgramming.com',
            'employees' => $all_employees
        ]);
    }
}