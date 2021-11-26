<?php
    session_start(); 
    //if user is not logged in
    if(!$_SESSION['loggedInUser'])
    {
        //send them to the login page
        header("Location: login.php");
    }
    $newname = $_SESSION['loggedInUser'] ;
    //connect to database
    include('includes/connection.php');
    //query and result
    $query = "SELECT * FROM clients WHERE head='$newname'";
    $result = mysqli_query($conn, $query);
    //check for query string    
    if(isset($_GET['alert']))
    {
        //new client added
        if( $_GET['alert'] == 'success')
        {
            $alertMessage = "<div class='alert alert-success'>New Client added!<a class='close' data-dismiss='alert'>&times;</a></div>";
            
        }
        elseif($_GET['alert'] == 'updatesuccess')
        {
            $alertMessage = "<div class='alert alert-success'> Client Updated!<a class='close' data-dismiss='alert'>&times;</a></div>";
            
        }
        elseif($_GET['alert'] == 'deleted')
        {
            $alertMessage = "<div class='alert alert-success'> Client Deleted!<a class='close' data-dismiss='alert'>&times;</a></div>";
        }
         elseif($_GET['alert'] == 'updatesuccess1')
        {
            $alertMessage = "<div class='alert alert-success'>Your password has been reset!<a class='close' data-dismiss='alert'>&times;</a></div>";
        }
    }
    //close the connection
    mysqli_close($conn);
    include('includes/header.php');
?>

<br><br><br><br>
<body style="background: url('includes/img/woodback.jpg');">

<div class="content" style="position: relative; /* Position the background text */
    bottom: 200px;
    top: 1px;
    /* At the bottom. Use top:0 to append it to the top */
    background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
    color: #f1f1f1; /* Grey text */
    width:100%; /* Full width */
    padding: 20px; /* Some padding */">
    <h1>Client Address Book</h1>

    <?php echo $alertMessage; ?>
<table class="table">
    <thead class="thead-light">
              
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Company</th>
        <th>Notes</th>
        <th>Head</th>
        <th>Edit</th>
    </tr>
        </thead>
    <?php
        if(mysqli_num_rows($result)>0)
        {
            //we have data!
            //output the data
            while( $row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>". $row['name']. "</td><td>". $row['email']. "</td><td>". $row['phone']. "</td><td>". $row['address']. "</td><td>". $row['company']. "</td><td>". $row['notes']. "</td><td>".$row['head']. "</td>";
                echo '<td><a href="edit.php?id=' . $row['id']. '"><span class="oi oi-pencil"></span></a></td>';
                echo "</tr>";
                                
            }
            
            
        }
        else
            {
                //if no clients
                echo "<div class='alert alert-warning'>You have no clients!</div>";
            }
    mysqli_close($conn);
    ?>
    

    <tr>
        <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="oi oi-plus"></span> Add Client</a></div></td>
        
    </tr>
</table>
    </div>

<?php
include('includes/footer.php');
?>