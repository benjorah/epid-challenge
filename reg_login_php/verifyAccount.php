<?php

    // require_once('../connection/db_connect.php');
    // session_start();


    $response = array();
    $result=false;
    $userName="";
    $token=$_GET['token'];
    $info="";
    $errorCode=false;

        function hello(){
          return 1;
        }

        if (isset($_GET['token'])) {
          // echo password_verify($_POST['loginPassword'], '$2y$10$MCgpLLlMKoiLCZpUmHR2Oexm3ONb05thbmdMQkLeVdcvsUPZlH7Wq');


          // $stmt = $pdo->query("SELECT password FROM users WHERE 1= hello()");
          $stmt = $pdo->prepare("SELECT email,user_id FROM users WHERE md5(email) = :token AND verified=:ver");

          $result=$stmt->execute(array(
            ':token'=>$token,
            ':ver'=>false
          ));



          while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

            $stmt2 = $pdo->prepare("UPDATE users SET verified=:verified WHERE user_id=:user_id");

            $result=$stmt2->execute(array(
              ':verified'=>1,
              ':user_id'=>$row['user_id']
            ));
            if($result){
              $info="Executed";
              $to = "".$row['email']."";
      $subject = "Account verified";
      $txt = 'Hi,
         <br/>
        You have successfully verified your account on the Epid Management site.<br/>
        We hope you enjoy a productive patnership with us.<br/>
        We appreciate your patronage.
        <br/>
        <br/>

        Thank you for your trust in our solutions,<br/>
        Epid Management Team';

      $headers = "From: noreply@ftdlogistics.com" . "\r\n" ;
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      mail($to,$subject,$txt,$headers);
            }

          }

        }



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Verify Account</title>

  </head>
  <body style="background: #141E30;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #243B55, #141E30);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #243B55, #141E30); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">



<div class="container">
  <div class="card col-sm-12 col-md-8 col-lg-8 col-xl-4" style="width: 25rem;margin:auto;margin-top:50px">
    <div class="card-body">
  <div style="margin:auto">
    <?php
    if($info==="Executed"){
  echo '<h6 clss="card-head">Your account has been verified successfully, <a href="index.php">Proceed to login</a></h6>';
}

else{
  echo '<h5 clss="card-head">Invalid operation, how did you even get here?</h5>';

}
  ?>
</div>
</div>
</div>
</div>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </body>
</html>

<style>

button:hover,a:hover{
  cursor: pointer;
}
body{
  text-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
    font-family: 'Lato', sans-serif;
}

</style>
