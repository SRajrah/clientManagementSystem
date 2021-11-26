
<?php 
    include('includes/connection.php');
    include('includes/functions.php');
    
    if(isset($_POST["home"]))
    {
        header("Location:index.php");
    }
    
    if( isset( $_POST["add"] ) ) {
        
        
        // check to see if inputs are empty
        // create variables with form data
        // wrap the data with our function
        $username = $email = $password= $confirmPassword= "";
        
        if( !$_POST["username"] ) {
            $nameError = "Please enter a username <br>";
        } else {
            $username = validate( $_POST["username"] );
        }
        
        if( !$_POST["email"] ) {
            $emailError = "Please enter your email <br>";
        } else {
            $email = validate( $_POST["email"] );
        }
        
        if( !$_POST["password"] ) {
            $passwordError = "Please enter your password <br>";
        } else {
            $password = validate( $_POST["password"] );
        }
        
        if( !$_POST["confirmPassword"] ) {
            $confirmPasswordError = "Please confirm your password <br>";
        } else {
            $confirmPassword = validate( $_POST["confirmPassword"] );
        }
        
        if(($_POST["password"] === $_POST["confirmPassword"]) && ($_POST["confirmPassword"]) && ($_POST["password"]))
        {
            
            $password = password_hash("$password",PASSWORD_DEFAULT);
            $confirmPassword = $password;
            
        }
        else
        {
            
            $matchError = "Passwords do not match. please type again!";
            $confirmPassword = "";
        }
       
           
       
        
        
        //checks to see if empty
        
        if($username && $password && $email && $confirmPassword)
        {
            
                $query = "INSERT INTO users (id, name, password, email)VALUES (NULL, '$username', '$password', '$email')";
            
            
                if ( mysqli_query( $conn, $query))
                {
                    echo "<div class='alert alert-success'><br><br><br><br>New record in database!</div>";
                    session_Start();
                    //corect the login detials
                //store data in session variables
                $_SESSION['loggedInUser'] = $username;
                //redirect user to clients page
                header("location: homepage1.php");
                    
                }
                else
                {   
                    
                   echo "<div class='alert alert-danger'><br>Your <strong>email</strong> is already registered with us. Please try to <strong>login</strong> to your <em>existing account</em> using this email or enter a <strong><em>new email!</em></strong></div>";
                    //echo "Error: ". $query ."<br>" .mysqli_error($conn);
                }
        }
            
                
        
    }

    /* mysql insert query
    INSERT INTO users (id, username, password, email, signup_date, biography)VALUES (NULL, 'jacksonsmith', 'abc123', 'jack@son.com', CURRENT_TIMESTAMP, 'Hello! i'm Jackson. This is my bio');
    */
    mysqli_close($conn);
    
include('includes/header.php');

?>

<link href="includes/stylesforlogin.css" rel="stylesheet">
<br><br>
       <div class="container">
           
            <div id="myform">
                

                 <body class="text-center">

                <form class="form-signin" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                    <div class="align-self" style="display: inline-table; "><img class="mb-4" src="includes/img/logo1.png" alt="" width=90% height= 100% ></div>   
                    <!--<p class="text-danger">* Required fields</p>-->
                <small class="text-danger"><?php echo $nameError; ?></small>
                <input type="text" placeholder="username" name="username"  class="form-control" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>">
                
                <small class="text-danger"><?php echo $emailError; ?></small>
                <input type="email" placeholder="Email" name="email" class="form-control" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                
                <small class="text-danger"><?php echo $passwordError; ?></small>
                <input type="password" placeholder="password" class="form-control" name="password">
                
                <small class="text-danger"><?php echo $confirmPasswordError; ?></small>
                <small class="text-danger"><?php echo $matchError; ?></small>
                <input type="password" placeholder="Confirm password"  class="form-control" name="confirmPassword">
                <button type="submit" name="add" class="btn btn-primary" style="width:100%;">Sign Up</button>
                    &nbsp;
                <button type="submit" name="home" class="btn btn-primary" style="width:100%;">Home</button>
            </form>
                </body>
           </div>
           
           
           
          
       </div>
   
 <?php
include('includes/footer.php');
?>   
     