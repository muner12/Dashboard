<?php
// Assuming you have a database connection already established
$connection=mysqli_connect("localhost","root","","botony");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedTable = $_POST['table'];
    $name = $_POST['name'];
    $family = $_POST['family'];
    $synonym = $_POST['synonym'];

    $query = "SELECT * FROM $selectedTable WHERE botanical LIKE '%$name%' AND family LIKE '%$family%' AND synonyams LIKE '%$synonym%'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // Start generating the HTML table
        $tableHead="<table class='table table-hover table-striped table-condensed'>
        <thead class='border border-white'>
        <tr style='background-color:black;color:white;'>
     
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
       
            while ($row = $result->fetch_assoc()) {
               
                $tableBody=$tableBody."<tr>
           
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
                <td  class='description truncated '><div class='content'>".$row['description']."</div></td>
                
                <td class='image-column'><div class='image-zoom'><img width='70' height='50' src='../../admin/upload/".$selectedTable."/".$row['picture']."'></div></td>
                </tr>";
                
            }
            echo $tableHead."".$tableBody."</tbody></table>";
        } else {
            echo 'No results found.';
        }
    // Send the HTML table as the response
   
}

