<?php
    include('includes/header.php');
?>
<?php
    
    //start the session
    session_start();
    //include fucntion.php
    include('includes/functions.php');
    //if login form is submitted
    if(isset ($_POST['home']))
    {
        header("location: index.php");
    }
    if( isset( $_POST['fsubmit']))
    {
        
        //create variables
        //wrap data with validate function
        if( !$_POST["email"] ) {
            $emailError = " * Please enter your email <br>";
        } else {
            $formEmail = validate( $_POST["email"] );
        }
        

       /* $formEmail = validate($_POST['email']);
        $formPass = validate($_POST['password']); */
        //connect to database
        include('includes/connection.php');
        //create query
        $query = "SELECT name, password FROM users WHERE email='$formEmail'";
        //store the result
        $result = mysqli_query($conn, $query);
        //verify if the result is returned
        if(mysqli_num_rows($result)>0)
        {
            //store the basic user data in variables
            /*while( $row = mysqli_fetch_assoc($result))
            {
                $name = $row['name'];

            }*/
            // verify hashed password with the submitted password
            $emailsent = "<div class='alert alert-success'>A reset link has been sent to your registered email.<a class='close' data-dismiss='alert alert-danger'>&times;</a></div>";
            //header("location: index.php");
        }
        else
        {
            $fError = "<div class='alert alert-danger'>No such user exists in database. Please try again!<a class='close' data-dismiss='alert alert-danger'>&times;</a></div>";
        }
        
    }
    //close mysql connection
    mysqli_close($conn);
include('includes/header.php');
?>
<br><br><br>
<link href="includes/stylesforlogin.css" rel="stylesheet">
        <div class="container" style="width: 400px;
        margin: 40px auto 0;
        padding: 50px;
        box-sizing: border-box;
        background: url(includes/img/paper-pattern.jpg) top left repeat;
        box-shadow:  0 10px  15px -8px #000;
        -webkit-border-radius: 5px;
        text-align: center;">
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" class="form-signin" name="frmForgot" id="frmForgot" method="post" >
            <h2 style="text-align:left;">Forgot Password?</h2>
            <p>Not a problem!<br> Enter your registered <em>email</em> and we'll send you a reset link!</p>
	           <div id="validation-message">
	           <?php echo $fError; ?>
               <?php echo $emailsent; ?>    
	           </div> 
	           <div class="field-group">
		          
		          <div><input type="email" name="email" id="user-email" class="form-control" placeholder="Your Email"></div>
	           </div>
	           <br>
	           <div class="field-group">
		          <div><button class="btn btn-sm btn-primary btn-block" type="submit" name="fsubmit" >Submit</button></div>
                `<div><button class="btn btn-sm btn-primary btn-block" type="submit" name="home" >Home</button></div>
	           </div>	
        </form>
</div>
<?php
    include('includes/footer.php');
?>    
