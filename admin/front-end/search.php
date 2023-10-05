<?php
// Replace with your database connection code
$mysqli = new mysqli("localhost", "root", "", "botony");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Query the database with a UNION to search across multiple tables
    $sql = "(SELECT 'algue' AS source, botanical, synonyams, family FROM algue WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'angiosperms' AS source, botanical, synonyams, family FROM angiosperms WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'bryophytes' AS source, botanical, synonyams, family FROM bryophytes WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'fungi' AS source, botanical, synonyams, family FROM fungi WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'gymnosperms' AS source, botanical, synonyams, family FROM gymnosperms WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'lichens' AS source, botanical, synonyams, family FROM lichens WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'pteridophytes' AS source, botanical, synonyams, family FROM pteridophytes WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')";
    
    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class=" border result-item">';
            echo '<strong>Source:</strong> ' . $row['source'] . '<br>';
            echo '<strong>Botanical:</strong> ' . $row['botanical'] . '<br>';
            echo '<strong>synonyams:</strong> ' . $row['synonyams'] . '<br>';
            echo '<strong>Family:</strong> ' . $row['family'];
            echo '</div>';
        }
    } else {
        echo 'No results found.';
    }

    $result->close();
}

$mysqli->close();
?>
