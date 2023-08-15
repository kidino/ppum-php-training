<?php 

namespace App\Ujian;

class Darah {

    public $jenis;
    public $ml;
    public $status;

    public function buat_ujian() {

        $d = "O+";
        $a = [ "B+", "C"];
        
        echo "Ujian darah {$a[0]} sedang dijalankan<br>";
        echo 'Ujian darah '.$this->jenis.' sedang dijalankan<br>';
    }

}