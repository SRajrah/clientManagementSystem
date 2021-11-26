<?php
    //start the session
    session_start();
    //include fucntion.php
 if( !$_SESSION['loggedInUser'])
    {
        //send them to the login page
        header("Location: login.php");
    }
?>
<!DOCTYPE html>

<html style="position: relative; min-height: 100%;">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="includes/img/favicon.png" type="image/png">


        <title>Client Address Book</title>

        <!-- Bootstrap CSS -->
         <!--bootstrap-cdn-->

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="homepage.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous">
        <!--<link href="styles.css" rel="stylesheet">-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="background: url('includes/img/woodback.jpg');">  
        <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            <?php
                    if($_SESSION['loggedInUser']) //if user is logged in
                    {
                ?>
            <a class="navbar-brand" href="homepage1.php">CLIENT<strong>MANAGER</strong></a>
            <?php
                    }
                    else
                    {
                ?>
                <a class="navbar-brand" href="homepage.php">CLIENT<strong>MANAGER</strong></a>
             <?php
                    }
                ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    if($_SESSION['loggedInUser']) //if user is logged in
                    {
                ?>
                
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="clients.php">My clients</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="add.php">Add Clients</a>
                    </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="resetpass.php">Reset Password</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                </ul>
                <?php
                    }
                    else
                    {
                ?>
               
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                </ul>
                <?php
                    }
                ?>

            
            </div>
    </nav>
        </header>
        
  
        
<div class="container">
<br>



 <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="includes/img/couchfriends.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                  <h1><?php echo "Welcome to Client Manager, ".$_SESSION['loggedInUser']; ?></h1>
                <p>Client Manager Gives you an efficient platform to manage your business clients. A simple, easy to operate, easy to maintain, and easy to analyse client management system. </p>
                 
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="includes/img/slide3.jpg" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>It is Simple yet elegant</h1>
                <p>Client manager brings a very user friendly experience to the table.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="includes/img/slide4.jpg" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Easy to use</h1>
                <p>With client manager, maintain your business client information<br> in a hassle free way.The simpler it is, the easier it is to use.</p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
     
    


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
     <div class="content" style="position: relative; /* Position the background text */
                                margin: auto;
                                bottom: 10px;
                                top: 0 px;
                                height: 1200px;
                                background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
                                color: #f1f1f1; /* Grey text */
                                width:100%; /* Full width */
                                padding: 20px; /* Some padding */">
         
        <div class="container marketing">
          <hr class="featurette-divider">

        <div class="row featurette">
            
          <div class="col-md-7" style=" position: absolute;
                                        top: 100px;
                                        left: 30%;
                                        height: 10%;
                                        width: 60%;
                                        margin: -15% 0 0 -25%;">
            <h2 class="featurette-heading">Need of a Client Management System</h2>
              <br>
            <p class="lead">Modern business-customer relationships are built-on precisely understanding and supplementing customer needs. This pertains to everything from understanding customer perspectives to providing comprehensive customer resolutions. A Client Management System lets you cleverly control every aspect of your on-going customer relations, leading to higher customer satisfaction and retention.</p>
          </div>
          <div class="col-md-5"
                style=" position: absolute;
                top: 270px;
                left: 80%;
                height: 10%;
                width: 100%;
                margin: -15% 0 0 -25%;">
            <img class="featurette-image img-fluid mx-auto" src="includes/img/head1.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2" style="  position: absolute;
                                                    top: 540px;
                                                    left: 68%;
                                                    height: 10%;
                                                    width: 60%;
                                                    margin: -15% 0 0 -25%;">
            <h2 class="featurette-heading">How is this one different?</h2><br>
              <p class="lead">What this website brings to the table is simplicity.  A simple, easy to operate, easy to maintain, and easy to analyse client management system. A lot of already existing systems provide extra features but with that comes a great deal of complexity too, thereby making the system a little difficult to operate for a normal user.<br><strong><em>The simpler it is, the easier it is to use.</em></strong></p>
          </div>
          <div class="col-md-5 order-md-1" style="  position: absolute;
                                                    top: 590px;
                                                    left: 28%;
                                                    height: 10%;
                                                    width: 60%;
                                                    margin: -15% 0 0 -25%;">
            <img class="featurette-image img-fluid mx-auto" src="includes/img/head3.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7"
               style="  position: absolute;
                        top: 920px;
                        left: 28%;
                        height: 10%;
                        width: 60%;
                        margin: -15% 0 0 -25%;">
            <h2 class="featurette-heading">Oh yeah, it's that good.</h2><br>
            <p class="lead">
                Client Management system collects and streamlines data <br>to a single data collection platform.<br> Further, this data could be segregated based on a given set of parameters.</p>
          </div>
          <div class="col-md-5" style=" position: absolute;
                                        top: 950px;
                                        left: 78%;
                                        height: 10%;
                                        width: 60%;
                                        margin: -15% 0 0 -25%;">
            <img class="featurette-image img-fluid mx-auto" src="includes/img/head4.png" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- Three columns of text below the carousel -->
    <!-- (<div class="row"  style="position: relative; /* Position the background text */
                                bottom: -580px;
                                background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
                                color: #f1f1f1; /* Grey text */
                                 width: 100%;
                                /* Full width */
                                padding: 40px; /* Some padding */">
          <div class="col-lg-4">
              
            </div><!-- /.col-lg-4 --)>
          <div class="col-lg-4">
              <h3>About the <em>Developer</em></h3>
            <img class="rounded-circle" src="includes/img/mypic1.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Shubham Rajrah</h2>
            <p>Hey, I’m Shubham ! I’m a 21 year old 2nd Year,B.tech student and entrepreneur from the Northern state-J &amp; K. I have recently started learning Web Development, and i aim to  work regularly as a freelance web designer, and enjoy Mondays because I love what I do.</p>
            </div><!-- /.col-lg-4 --)>
          <div class="col-lg-4">
            
          </div><!-- /.col-lg-4 --)>
        </div><!-- /.row --)>-->


        <!-- START THE FEATURETTES -->

        

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
     </div>
    </main>
    </div><!-- end .container -->

        
    <footer class="footer" style="  position: absolute;
                                    top:2450px;
                                    width: 100%;
                                    height: 15px; /* Set the fixed height of the footer here */
                                    line-height: 5px; /* Vertically center the text there */
                                    background-color:#f1f1f1;
                                    padding :12px;">
      <div class="container">
        <span class="text-muted">Coded with &hearts; by <a href="http://bradhussey.ca/">Rajrah</a></span>
      </div>
    </footer>
        <!--jQuery  cdn-->
      <script src = "https://code.jquery.com/jquery-3.3.1.min.js"  integrity = "sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8 = "crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!--bootstrap js-->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    

    
    </body>
</html>