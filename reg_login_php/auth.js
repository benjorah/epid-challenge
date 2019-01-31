
$( document ).ready(function() {
  
  $body = $("body");
   $("#authError").hide();
   $("#authSuccess").hide();
   $("#authLoad").hide();

         



$(document).on({
    ajaxStart: function() { $("#authLoad").show();    },
     ajaxStop: function() { $("#authLoad").hide(); }
});
});



  $("#loginForm").submit(function(e){
    e.preventDefault();
    loginData={loginEmail: $("#loginEmail").val(),loginPassword: $("#loginPassword").val()};
    $("#authError").hide();
    $("#authSuccess").hide();

    $.post("login.php",
      loginData,
       function(data, status){
         data=JSON.parse(data);
          if(data["message"].toLowerCase()=="account has not been verified"){
                $("#authError").text("* Your account has not yet been verified, please check your email for a verification link.");
                $("#authError").show();
              }
         else if (data["message"].toLowerCase()=="wrong password"){

                $("#authError").text("* The password or email provided is incorrect and matches no records");

                $("#authError").show();

         }
         else if (data["message"].toLowerCase()=="logged in"){
           window.location.href = "home.php";

         }

       });

       return false;

     });



       $("#registerButton").on("click",function(e){
        e.preventDefault();
         $("#authError").hide();
         $("#authSuccess").hide();

         registerData={registerEmail: $("#registerEmail").val(),registerPassword: $("#registerPassword").val(),
         registerName:$("#registerName").val()};



         $.post("login.php",
           registerData,
            function(data, status){
              console.log(data);
              data=JSON.parse(data);
              if(data["message"].toLowerCase()=="account already exists"){
       
                $("#authError").show();
               $("#authError").html("* Account already exists");
             }


              else if(data["message"].toLowerCase()=="account created"){
                 $("#authSuccess").show();
               $("#authSuccess").html("* Account created.");
               window.location.href = "home.php";
               }

              

            });
  });

