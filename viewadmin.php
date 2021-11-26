<?php
    include('includes/connection.php');
?>
<?php
    
    $query = "SELECT * FROM users";
    
    $result = mysqli_query( $conn, $query);
    include('includes/header.php');
  
?>

 <br><br><br><br>   
<h2>Users in the <em>Database</em></h2>
            <?php
                 if(mysqli_num_rows($result)>0)
                 {
                     //if there is data
                     //output data
                     
                     echo "<table class='table table-dark'><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
                     while( $row = mysqli_fetch_assoc($result))
                     {
                         echo "<tr><td>". $row["id"]. "</td><td>" . $row["name"]. "</td><td>". $row["email"]. "</td></tr>"; 
                         
                     }
                 }
                 else
                 {
                     echo "no data found!";
                 }
                mysqli_close($conn);
            ?> 
            
<?php
include('includes/footer.php');
?>
