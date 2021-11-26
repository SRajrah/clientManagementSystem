<!DOCTYPE html>

<html style="position: relative;
    min-height: 100%;">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="shortcut icon" href="includes/img/favicon.png" type="image/png">


        <title>Client Address Book</title>

        <!-- Bootstrap CSS -->
         <!--bootstrap-cdn-->

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="stylesforlogin.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous">
        <!--<link href="styles.css" rel="stylesheet">-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>  
        
        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php
                    if($_SESSION['loggedInUser']) //if user is logged in
                    {
                ?>
                <a class="navbar-brand" href="homepage1.php">CLIENT<strong>MANAGER</strong></a>
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
                <a class="navbar-brand" href="index.php">CLIENT<strong>MANAGER</strong></a>
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
        
  
        
    <div class="container">