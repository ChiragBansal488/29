
<?php

include 'action2.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>login page</title>
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="javascriptcode.js"></script>
  
    <link rel="stylesheet" href="style.css">

  

    </head>

<!--body part-->

<body>
    <p id="demo"></p>

  
    <div id="container">
        <div class="register">
            <h2>Login Page </h2>
        </div>

        

        <!--BUTTON SECTION -->

        <div class="login">
            <table cellspacing="2" align="center" id ="console" >
                <tr>
                    <td id="comment">Enter User Name :</td>

                    <form action="action2.php" method="POST" id="file">
                        <td><input type="text"  name="username"
                                id="usrname" /></td>
                                
                </tr>

                <tr>
                   
                    <td>


                        </form>
                        <input type="button" value="Submit" onclick="validation()"  name="register"  id="btn" />
               
             
                        <div id="console">
                        
                    </td>
                </tr>
            </table>
        </div>
        <!-- <script>
             var el = document.getElementById("usrname");
    el.addEventListener("keypress", function(event) {
      if (event.key === 'Enter') {
        if(el.value==''){
        alert("Please Enter Username First");
          event.preventDefault();
          return false;
      }
      else {
      return test()
      } }
     
    });
        </script> -->
      

</body>
<!--body part ends here-->
</html>