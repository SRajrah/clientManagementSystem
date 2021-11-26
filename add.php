<?php
    session_start();
    //if user is not logged in
    if( !$_SESSION['loggedInUser'])
    {
        //send them to the login page
        header("Location: login.php");
    }
    $newuser = $_SESSION['loggedInUser'];
    //connect to the database
    include('includes/connection.php');
    //include function file
    include('includes/functions.php');
    //if form is submitted
    
    //if cancel button is pressed
    if(isset( $_POST['cancel']))
    {
        header("Location: clients.php");
    }
    
    if(isset( $_POST['add']))
    {
        //set all variables to empty by default
        $clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes = $clientHead ="";
        //check to see if inputs are empty
        //create varialbes with form data
        //wrap the data with our functions
        if(!$_POST["clientName"])
        {
            $nameError = "Please enter a name<br>";
        }
        else
        {
            $clientName = validate($_POST["clientName"]);
        }
        if(!$_POST["clientEmail"])
        {
            $emailError = "Please enter an email<br>";
        }
        else
        {
            $clientEmail = validate($_POST["clientEmail"]);
        }
        //these inputs are not required
        //so we' ll just store whatever has been entered
        $clientPhone = validate($_POST["clientPhone"]);
        $clientAddress = validate($_POST["clientAddress"]);
        $clientCompany = validate($_POST["clientCompany"]);
        $clientNotes = validate($_POST["clientNotes"]);
        $clientHead = validate($_POST["$clientHead"]);
        validate($newuser);
        //if required fields have data
        if($clientName && $clientEmail)
        {
            //create query
            
            $query = "INSERT INTO clients(id, name, email, phone, address, company, notes, date_added, head)VALUES(NULL, '$clientName', '$clientEmail', '$clientPhone', '$clientAddress', '$clientCompany', '$clientNotes', CURRENT_TIMESTAMP, '$newuser')";
            
            $result = mysqli_query($conn, $query);
            //if query was successful
            if($result)
            {
                //refresh page with query string
                header("Location: clients.php?alert=success");
            }
            else
            {
                //something went wrong
                echo "Error: ".$query."<br>". mysqli_error($conn);
            }
        }
    }
    //close the mysql connection
    mysqli_close($conn);
    include('includes/header.php');
?>
<body style="background: url('includes/img/woodback.jpg');">
<br><br><br><br>
<div class="" style="padding:15px;  background: rgba(0, 0, 0, 0.5); color:white;">
<h1>Add Client</h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="client-name">Name *</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email *</label>
        <input type="email" class="form-control input-lg" id="client-email" name="clientEmail" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-notes">Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes"></textarea>
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Head</label>
        <input type="text" class="form-control input-lg" id="clienthead" name="clientHead" value="<?php echo $newuser; ?>" readonly="readonly">
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-secondary" name="cancel" >Cancel</button>
        
            &nbsp;
            <button type="submit" class="btn btn-success" name="add" >Add Client</button>
    </div>
</form>
    </div>

<?php
include('includes/footer.php');
?>