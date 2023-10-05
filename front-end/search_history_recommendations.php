<?php
// Replace with your database connection code
$mysqli = new mysqli("localhost", "root", "", "botony");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve the user's search history from local storage
$searchHistory = isset($_POST['searchHistory']) ? json_decode($_POST['searchHistory']) : [];

// Create an array to store recommended species
$recommendedSpecies = [];

// Loop through the search history and query the database for recommendations
foreach ($searchHistory as $query) {
    // Initialize an empty array to store search results for each table
    $tableResults = [];

    // Define an array of table names
    $tableNames = ['algue', 'angiosperms', 'bryophytes', 'fungi', 'gymnosperms', 'lichens', 'pteridophytes'];

    // Loop through the table names and query each table
    foreach ($tableNames as $tableName) {
        // Perform a database query to find species related to the search history
        // You can adjust the query based on your specific criteria for recommendations
        $sql = "SELECT botanical, synonyams, family FROM $tableName WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Add the source table name to the result
                $row['source'] = $tableName;
                $tableResults[] = $row;
            }
        }
    }

    // Add the results for this query to the recommendedSpecies array
    $recommendedSpecies = array_merge($recommendedSpecies, $tableResults);
}

// Close the database connection
$mysqli->close();

// Return the recommended species as JSON
echo json_encode($recommendedSpecies);
?>
