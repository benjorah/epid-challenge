
<?php
session_start();
    if(!isset($_SESSION['current_user_id'])){
     setcookie('where_from','order',(int)time()+7000,'/');
     header("Location:index.php");
     return;
   }

   else{
     $userName=$_SESSION['current_user_name'];
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



    <form class="form-signin" action="login.php" method="post">

        <h2 class="form-signin-heading text-center mb-3">Welcome Home <?php echo $userName ?> </h2>

        <form action="login.php" method="post" class="row justify-content-center my-4">
          <button type="submit" id="submit" name="log_out" class="form-signin-heading text-center mb-3">LOG OUT</button>
        </form>


       
      </form>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>