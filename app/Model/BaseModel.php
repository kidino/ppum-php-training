<?php  
namespace App\Model; 

class BaseModel {

    public $table;
    public $db;

    function __construct() {
        global $db;
        $this->db = $db;

    }

    public function get_all() {
        $query = "SELECT * FROM {$this->table}"; 
        try {
            $stmt = $this->db->query($query);
            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

}