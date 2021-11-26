<?php
     session_start(); 
    //if user is not logged in
    if(!$_SESSION['loggedInUser'])
    {
        //send them to the login page
        header("Location: login.php");
    }
    $userID = $_GET['id'];
    $reuser = $_SESSION['loggedInUser'];
    $useremail = $_SESSION['loggedInEmail'];
    //set up connection
    include('includes/connection.php');
    include('includes/functions.php');
    //query and result
   
    if( isset( $_POST["reset"] ) ) {
        
        
        // check to see if inputs are empty
        // create variables with form data
        // wrap the data with our function
        
        if( !$_POST["old_password"] ) {
           $oldpassError = "Please enter your old password <br>";
        } else {
            $old_password = validate( $_POST["old_password"] );
        }
        
        if( !$_POST["new_password"] ) {
            $newpassError = "Please enter your new password <br>";
        } else {
            $new_password = validate( $_POST["new_password"] );
        }
        
        if( !$_POST["confirm_newpassword"] ) {
            $confError = "Please confirm your new password <br>";
        } else {
            $confirm_newpassword = validate( $_POST["confirm_newpassword"] );
        }
        
        if(($_POST["new_password"] === $_POST["confirm_newpassword"]) && ($_POST["confirm_newpassword"]) && ($_POST["new_password"]))
        {
            
            $new_password = password_hash("$new_password",PASSWORD_DEFAULT);
            $confirm_newpassword = $new_password;
            
        }
        else
        {
            
            $matchError = "New Passwords do not match. please type again!";
            $confirm_newpassword = "";
        }
        
        $query = "SELECT password FROM users WHERE email='$useremail'";
        $result = mysqli_query($conn, $query);
       
        if(mysqli_num_rows($result)>0)
        {
            //store the basic user data in variables
            while( $row = mysqli_fetch_assoc($result))
            {
               
                $hashedPass = $row['password'];
               
            }
            // verify hashed password with the submitted password
            if(password_verify($old_password, $hashedPass))
            {
                    
                    $query = "UPDATE users
                    SET password='$new_password'
                    WHERE email='$useremail'";
                    $result = mysqli_query($conn, $query);
                    if($result)
                        {
                        //redirect to client page with query string
                        header("Location: clients.php?alert=updatesuccess1");
                        }
                    else
                        {
                            echo "Error updating record: ".mysqli_error($conn);
                        }
                    
                
            }
            else
            {
                //error message
                $old_matchError = "<div class='alert alert-danger'> Incorrect old password</div>";
            }
        }
        else
        {
            $userError = "<div class='alert alert-danger'>No such user exists in database. Please try again!<a class='close' data-dismiss='alert alert-danger'>&times;</a></div>";
        }
        
           
    }

    /* mysql insert query
    INSERT INTO users (id, username, password, email, signup_date, biography)VALUES (NULL, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! i'm Jackson. This is my bio');
    */
    mysqli_close($conn);
    
include('includes/header.php');
?>
<link href="includes/stylesforlogin.css" rel="stylesheet">

<br><br><br>
    <form class="form-signin" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
      <!--<h1 class="h3 mb-3 font-weight-normal">Sign in</h1>-->
        <small class="text-danger"> <?php echo $oldpassError; ?></small>
        <input type="password" id="oldpass" class="form-control" placeholder="Old Password" name="old_password" required autofocus>
        <small class="text-danger"> <?php echo $newpassError; ?></small>
        <input type="password" id="newpassword" class="form-control" placeholder="New Password" name="new_password" required>
        <small class="text-danger"> <?php echo $confError; ?></small>
        <input type="password" id="confirmnewpassword" class="form-control" placeholder=" confirm New Password" name="confirm_newpassword" required>
         <small class="text-danger"> <?php echo $matchError; ?></small>
         <small class="text-danger"> <?php echo $old_matchError; ?></small>
         <small class="text-danger"> <?php echo $userError; ?></small>
      <button class="btn btn-sm btn-primary btn-block" type="submit" name="reset" >Reset</button>
     </form>
<?php
    include('includes/footer.php');

?>