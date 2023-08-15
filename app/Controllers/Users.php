<?php
namespace App\Controllers;

class Users {

    function index() {
        global $db;
        
        $query = "SELECT * FROM users"; 
        try {
            $stmt = $db->query($query);            
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }    
    
        echo "<h2>Users</h2>";
        echo "<ol>";
        foreach( $stmt->fetchAll() as $user ) {
            echo "<li><a href='/user/{$user['id']}'>{$user['username']} [{$user['email']}]</a></li>";
        }
        echo "</ol>";
    }

    // -------------------------------- 

    function details( $id ) {
        global $db;

        $query = "SELECT users.id, users.username, users.email,profiles.bio
        FROM users 
        left join profiles on users.id = profiles.user_id
        where users.id = :id"; 
        try {
            $stmt = $db->prepare($query);            
            $stmt->bindParam(':id', $id ); 
            $stmt->execute();           
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }    
        
        $user = $stmt->fetch();

        echo "<p><a href='/users'>&laquo; Back</a></p>";
        echo "<h2>Details</h2>";
        echo "<h3>$user[username]</h3>";
        echo "<p>$user[email]</p>";
        echo "<p>$user[bio]</p>";
    }
}

