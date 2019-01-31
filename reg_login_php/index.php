<?php 

    if(isset($_SESSION['current_user_id'])){
        header("Location:home.php");
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <title>Account</title>

    <style type="text/css">
      body{
        background:#eee;
        height: 500px;
      }

    .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }

    .form-signin input {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;

    </style>
  </head>
  <body class="container align-items-center justify-content-center">

        <h1 class="form-signin-heading my-5 text-center">Epid Management System</h1>



    <form class="form-signin" id="loginForm">

        <h2 class="form-signin-heading text-center mb-3">Enter Details</h2>
         <p id="authError" class="form-signin-heading text-center mb-3 alert-danger">Error</p>
        <p id="authSuccess" class="form-signin-heading text-center mb-3 alert-success">success</p>
        <p id="authLoad" class="form-signin-heading text-center mb-3 alert-warning">Loading...</p>

        <label for="loginEmail" class="sr-only">Email</label>
        <input type="email" id="loginEmail" name="loginEmail" class="form-control" placeholder="Email" required="">
        <div class="checkbox">
         <label for="loginPassword" class="sr-only">Password</label>
        <input type="password" id="loginPassword" name="loginPassword" class="form-control" placeholder="password" required="">
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-2">Don't have an account?<a href="register.php">Register</a></p>

      </form>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="auth.js"></script>
  </body>
</html>