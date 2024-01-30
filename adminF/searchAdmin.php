<?php
include '../connexion.php';

// Check if the search form is submitted
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM gestionpatient.admins WHERE nomAdmin LIKE :searchTerm OR prenomAdmin LIKE :searchTerm";

    // Prepare the query
    $stmt = $db->prepare($query);

    // Bind parameters
    $searchPattern = "%$searchTerm%";
    $stmt->bindParam(':searchTerm', $searchPattern, PDO::PARAM_STR);

    // Execute the query
    $stmt->execute();

    // Fetch data or do further processing as needed
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Process each row of data
        // ...
    }

    // Close the cursor
    $stmt->closeCursor();
} else {
    // Handle the case when the form is not submitted
    echo "No search term provided.";
}
?>