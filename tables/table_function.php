<?PHP
include('../functions.php');


function showTable($tableName,$con,$ROOT,$path){
    $arr=encrypt($tableName);
  
   
?>

<div class="jumbotron">
    <div class="d-flex justify-content-center text-success"><h3><?php echo ucfirst($path); ?> table</h3></div>
    <div class="d-flex justify-content-start">
        <a class="btn btn-outline-success mb-1" href="../<?Php echo $path?>.php">
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
        </a>

    </div>
    <div class="table-responsive-sm">
        <!-- Table -->
        <table class="table table-hover table-striped table-bordered table-font">
            <thead class="bg-secondary">
                <th>S#</th>
                <th>Botinical Name</th>
                <th>synonyams</th>
                <th>family</th>
                <th>country</th>
                <th>province</th>
                <th>collector</th>
                <th>collection_number</th>
                <th>year</th>
                <th>Image</th>
                <th colspan="2" style="text-align:center">Actions</th>


            </thead>
            <tbody>
                <?php
    $results_per_page = 10;  
  
    //find the total number of results stored in the database  
    $query = "select *from {$tableName}";  
    $result = mysqli_query($con, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) || $_GET['page']=="" ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  
  
    //retrieve the selected results from database   
    $query = "SELECT *FROM {$tableName} order by collection_number asc LIMIT ". $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($con, $query);  
    $i=0;
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr>

        <td>".++$i."</td>
        <td>".$row['botanical']."</td>
        <td>".$row['synonyams']."</td>
        <td>".$row['family']."</td>
        <td>".$row['country']."</td>
        <td>".$row['province']."</td>
        <td>".$row['collector']."</td>
        <td>".$row['collection_number']."</td>
        <td>".$row['year']."</td>
        <td><img width='50px' height='35px' src='../upload/{$path}/{$row['picture']}'></td>
        <td> <a class='btn btn-sm btn-outline-danger' href='../delete.php?speciesId={$row['id']}&path={$path}&table={$arr}}'><i class='fa fa-trash'></i></a></td>
        <td><a class='btn btn-sm btn-outline-primary' href='{$ROOT}/{$path}.php?id={$row['id']}&type=update'><i class='fa fa-pencil'></i></a></td>
        </tr>";
    }

    ?>
            </tbody>


        </table>

    </div>

    <!-- pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item ">
                <?PHP if($page>=2){?>
                <a class="page-link" href="<?php echo $path.".php?page=".$page-1; ?>" tabindex="-1">Previous</a>
                <?php  } ?>
            </li>
            <?php
                             for($i = 1; $i<= $number_of_page; $i++) {  
                                if($page==$i){
                                echo '<li class="page-item active"><a class="page-link" href = "'.$path.'.php?page=' . $i . '">' . $i . ' </a></li>';  
                                }else{
                                    echo '<li class="page-item "><a class="page-link" href = "'.$path.'.php?page=' . $i . '">' . $i . ' </a></li>';  
                                 
                                }
                            } 
                            ?>

            <li class="page-item">
                <?PHP if($page<$number_of_page){?>
                <a class="page-link" href="<?php echo $path.".php?page=".$page+1; ?>">Next</a>
                <?PHP } ?>
            </li>
        </ul>
    </nav>
    <!-- pagination end -->
</div>
</div>




<?PHp  } ?>