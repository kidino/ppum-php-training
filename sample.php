<?php 
<?php
$host = 'localhost';
$dbname = 'ppum-ilab';
$username = 'root';
$password = '';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query with named parameter
    $searchTerm = '%i\'tidal%'; // Search term for the LIKE condition
    $query = "SELECT id, full_name, position FROM employees WHERE full_name LIKE :search_term";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':search_term', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    // Fetch and display the results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "Employee ID: " . $row['id'] . "<br>";
        echo "Full Name: " . $row['full_name'] . "<br>";
        echo "Position: " . $row['position'] . "<br><br>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
