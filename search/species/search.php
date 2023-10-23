<?php
// Replace with your database connection code
$mysqli = new mysqli("localhost", "root", "", "botony");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Query the database with a UNION to search across multiple tables
    $sql = "(SELECT 'algue' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM algue WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'angiosperms' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM angiosperms WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'bryophytes' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM bryophytes WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'fungi' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM fungi WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'gymnosperms' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM gymnosperms WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'lichens' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM lichens WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')
            UNION
            (SELECT 'pteridophytes' AS source, botanical, synonyams, family,picture ,description ,year ,country ,province ,collector ,collection_number ,upload_date ,'group'  FROM pteridophytes WHERE botanical LIKE '%$query%' OR synonyams LIKE '%$query%' OR family LIKE '%$query%')";
    
    $result = $mysqli->query($sql);
    $tableHead="<table class='table table-hover table-striped table-condensed'>
    <thead class='border border-white'>
    <tr style='background-color:black;color:white;'>
    <th>species</th>
    <th>botanical</th>
    <th>synonyms</th>
    <th>family</th>
    <th>group</th>
    <th>country</th>
    <th>province</th>
    <th>collector</th>
    <th>collection#</th>
    <th>year</th>
    <th>upload date</th>
    <th>desciption</th>
    <th>Image</th>
    </tr>
    </thead>

    <tbody>
    ";
    $tableBody=" ";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            $tableBody=$tableBody."<tr>
            <td>".$row['source']."</td>
            <td>".$row['botanical']."</td>
            <td>".$row['synonyams']."</td>
            <td>".$row['family']."</td>
            <td>".$row['group']."</td>
            <td>".$row['country']."</td>
            <td>".$row['province']."</td>
            <td>".$row['collector']."</td>
            <td>".$row['collection_number']."</td>
            <td>".$row['year']."</td>
            <td>".$row['upload_date']."</td>
            <td  class='description truncated '><div class='content'>".$row['description']."</div><button class='view-more-button btn btn-xs btn-success'>view more</button></td>
            
            <td class='image-column'><div class='image-zoom'><img width='70' height='50' src='../../admin/upload/".$row['source']."/".$row['picture']."'></div></td>
            </tr>";
            
        }
        echo $tableHead."".$tableBody."</tbody></table>";
    } else {
        echo 'No results found.';
    }

    $result->close();
}

$mysqli->close();
?>
