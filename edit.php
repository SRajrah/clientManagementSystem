<?php
     session_start();
    //if user is not logged in
     if( !$_SESSION['loggedInUser'])
    {
        //send them to the login page
        header("Location: login.php");
    }
    //get ID sent by GET collection
    $clientID = $_GET['id'];
    //connect to the database
    include('includes/connection.php');
    //include function file
    include('includes/functions.php');
   
   //query the database with client ID 
    $query = "SELECT * FROM clients WHERE id='$clientID'";
    $result = mysqli_query( $conn, $query);
    //if result is returned
    $myuser = $_SESSION['loggedInUser'];
    if(mysqli_num_rows($result)>0)
    {
        //we have data!
        // set some variables
        while( $row = mysqli_fetch_assoc($result))
        {
            $clientName = $row['name'];
            $clientEmail = $row['email'];
            $clientPhone = $row['phone'];
            $clientAddress = $row['address'];
            $clientCompany = $row['company'];
            $clientNotes = $row['notes'];
            $clientHead = $row['head'];
        }
    }
    else
    {
        //no results returned
        $alertMessage = "<div class='alert alert-warning'>Nothing to see here.<a href='clients.php'>Head Back</a></div>";
        
    }
    //if update button was submitted
    if( isset($_POST['update']))
    {
        
            //set variables
            $clientName = validate($_POST["clientName"]);
            $clientEmail = validate($_POST["clientEmail"]);
            $clientPhone = validate($_POST["clientPhone"]);
            $clientAddress =validate($_POST["clientAddress"]);
            $clientCompany =validate($_POST["clientCompany"]);
            $clientNotes =validate($_POST["clientNotes"]);
            //$clientHead =validate($_POST["clientHead"]);
            $clientHead = validate($myuser);
            //new database query & result
            $query = "UPDATE clients
                    SET name='$clientName',
                    email='$clientEmail',
                    phone='$clientPhone',
                    address='$clientAddress',
                    company='$clientCompany',
                    notes='$clientNotes',
                    head ='$clientHead'
                    WHERE id='$clientID'";
            $result = mysqli_query($conn, $query);
            if($result)
            {
                //redirect to client page with query string
                header("Location: clients.php?alert=updatesuccess");
            }
            else
            {
                echo "Error updating record: ".mysqli_error($conn);
            }
        
    }
    
    //if delete was submitted
    if( isset($_POST['delete']))
    {
        $alertMessage = "<div class='alert alert-danger'><p>Are you sure you want to delete this client? No take backs!</p><br>
        
        <form action='".htmlspecialchars( $_SERVER["PHP_SELF"]) ."?id=$clientID' method='post'>
        
        <input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Yes, delete!'>
        
        <input type='submit' class='btn btn-sm' name='dont-delete' value='Dont, delete!'>

        
        
        </from>
        </div>";
        
    }
    //if confirm delete button was submitted
    if( isset($_POST['confirm-delete']))
    {
        //new database query & result
        $query = "DELETE FROM clients WHERE id='$clientID'";
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            //redirect to client page with query string
            header("Location: clients.php?alert=deleted");
        }
        else
        {
            echo "Error updating record" .mysqli_error($conn);
        }
    }
    //close the mysql connection
    mysqli_close($conn);
    
    
    

include('includes/header.php');
?>
<body style="background: url('includes/img/woodback.jpg');">

<br><br><br><br>
    <div class="" style="padding:15px;  background: rgba(0, 0, 0, 0.5); color:white;">
<h1>Edit Client</h1>
<?php echo $alertMessage; ?>


<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>?id=<?php echo $clientID; ?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="client-name">Name</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="<?php echo $clientName; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email</label>
        <input type="email" class="form-control input-lg" id="client-email" name="clientEmail" value="<?php echo $clientEmail; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="<?php echo $clientPhone; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="<?php echo $clientAddress; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="<?php echo $clientCompany; ?>">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-notes">Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"><?php echo $clientNotes; ?></textarea>
    </div>
    <div class="form-group col-sm-6">
        <label for="client-head">Head</label>
        <input type="text" class="form-control input-lg" id="client-Head" name="clientHead" value="<?php echo $clientHead; ?>" disabled>
    </div>
    <div class="col-sm-12">
        <hr>
        <button type="submit" class="btn btn-danger float-left" name="delete">Delete</button>
        <div class="pull-right">
            <a href="clients.php" type="button" class="btn  btn-default float-right">Cancel</a>
                
            <button type="submit" class="btn btn-success float-right" name="update">Update</button>

        </div>
    </div>
</form>
    </div>

<?php
include('includes/footer.php');
?>