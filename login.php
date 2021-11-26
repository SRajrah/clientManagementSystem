<?php
    //start the session
    session_start();
    //include fucntion.php
    include('includes/functions.php');
    //if login form is submitted
    if( isset( $_POST['login']))
    {
        
        //create variables
        //wrap data with validate function
        if( !$_POST["email"] ) {
            $emailError = " * Please enter your email <br>";
        } else {
            $formEmail = validate( $_POST["email"] );
        }
        
        if( !$_POST["password"] ) {
            $passwordError = " * Please enter your password <br>";
        } else {
            $formPass = validate( $_POST["password"] );
        }
       /* $formEmail = validate($_POST['email']);
        $formPass = validate($_POST['password']); */
        //connect to database
        include('includes/connection.php');
        //create query
        $query = "SELECT name, password, email FROM users WHERE email='$formEmail'";
        //store the result
        $result = mysqli_query($conn, $query);
        //verify if the result is returned
        if(mysqli_num_rows($result)>0)
        {
            //store the basic user data in variables
            while( $row = mysqli_fetch_assoc($result))
            {
                $name = $row['name'];
                $hashedPass = $row['password'];
                $email = $row['email'];
            }
            // verify hashed password with the submitted password
            if(password_verify($formPass, $hashedPass))
            {
                //corect the login detials
                //store data in session variables
                $_SESSION['loggedInUser'] = $name;
                $_SESSION['loggedInEmail'] = $email;
                //redirect user to clients page
                header("location: clients.php");
                
            }
            else
            {
                //error message
                $loginError = "<div class='alert alert-danger'> Wrong Username/Password combination. Please try again!</div>";
            }
        }
        else
        {
            $loginError = "<div class='alert alert-danger'>No such user exists in database. Please try again!<a class='close' data-dismiss='alert alert-danger'>&times;</a></div>";
        }
        
    }
    //close mysql connection
    mysqli_close($conn);
include('includes/header.php');
?>
<br><br><br>
<!--<h1  style="margin: 10 10 20px;
    padding: 0 0 20px;
    border-bottom: solid 1px #ddd;">Client Address Book</h1>
<p class="lead">Log in to your account.</p>-->
<?php echo $loginError ;?>

<!--<form class="form-inline" action="<php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" >
    <div class="form-group">
        <label for="login-email" class="sr-only">Email</label>
        <small class="text-danger">* <php echo $emailError; ?></small>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="email" value="<php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <small class="text-danger">* <php echo $passwordError; ?></small>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login" >Login</button>
</form>
-->
<link href="includes/stylesforlogin.css" rel="stylesheet">
 <body class="text-center">
    <form class="form-signin" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
      <img class="mb-4" src="includes/img/logo1.png" alt="" width=90% height= 100%>
      <!--<h1 class="h3 mb-3 font-weight-normal">Sign in</h1>-->
      <label for="inputEmail" class="sr-only">Email address</label>
        <small class="text-danger"> <?php echo $emailError; ?></small>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
        <small class="text-danger"> <?php echo $passwordError; ?></small>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
        <!--<label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>-->
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" >log in</button>
        <br>
        <a href="forgot.php" style="color: #343a40;">Forgot Password?</a> 
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

<?php
include('includes/footer.php');
?>