<?php 

require_once('connection.php');
session_start();



if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
           $response["message"] = "Wrong password";


           $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");

          $result= $stmt->execute(array(
             ':email'=>$_POST['loginEmail']
           ));

           while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
             $_SESSION['current_user_id']=$row['id'];
             $_SESSION['current_user_name']=$row['name'];
            

            $result=$row['id'];
             $location="";
            //  if($row['verified']==0){
            // $response["message"] = "Account has not been verified";

            //  }

             if(!password_verify($_POST['loginPassword'], $row['password'])){
              $response["message"] = "Wrong Password";


                 break;
             }

             

             else{
             if(isset ($_COOKIE['where_from'])){
               $location="home.php";



             }
             
             $response["location"] = $location;
            $response["message"] = "Logged in";



            unset($_COOKIE['where_from']);
        }

           }

           echo json_encode($response);

    }

else if (isset($_POST['registerEmail']) && isset($_POST['registerPassword'])
    && isset($_POST['registerName'])) {



           $stmt = $pdo->prepare("SELECT * FROM users WHERE email=:email");

          $result= $stmt->execute(array(
             ':email'=>$_POST['registerEmail']
           ));

            $accountExist=false;
           while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $response["message"] = "Account already exists";
            $accountExist=true;

           }

           if(!$accountExist){

       $stmt = $pdo->prepare("INSERT INTO users (name,email,password)
         VALUES (:name,:email,:password)");

      $result= $stmt->execute(array(
         ':email'=>$_POST['registerEmail'],
         ':name'=>$_POST['registerName'],
         ':password'=>password_hash($_POST['registerPassword'], PASSWORD_DEFAULT)

       ));
         $token=md5($_POST['registerEmail']);

       if($result){
          $response["message"] = "Account created";

          //would give problems with mail serve setting 

         // $to = "".$_POST['registerEmail']."";
         // $subject = "Verify your account";
         // $txt = 'Hi,
         //    <br/>
         //   You are receiving this message because you have just registered on the Epid Management SIte.<br/>
         //   Please, follow this link to verify your new account:<br/>
         //   <a href="localhost/reg_login_php/verifyAccount.php?token='.$token.'">Account Verification Link</a>
         //   <br/> <br/>
         //   <p>If you have not registered on our site, you can just delete this email.</p>
         //   <br/>
         //   Thank you for your trust in our solutions,<br/>
         //   Epid Team';

         // $headers = "From: noreply@ftdlogistics.com" . "\r\n" ;
         // $headers .= "MIME-Version: 1.0\r\n";
         // $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
         // mail($to,$subject,$txt,$headers);
         //     $location="index.php";

           //$result="../order_history/index";




         }
     }

     echo json_encode($response);

}


else if(isset($_POST['log_out'])){

    unset($_SESSION['current_user_id']);
   unset($_SESSION['current_user_email']);

            header("Location: index.php");


}

  

?>