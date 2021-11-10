
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>login page</title>
      <!-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="javascriptcode.js"></script> -->
  
    <link rel="stylesheet" href="style2.css">
    <script src="js/invoice.js"></script>

  

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
                
                   

                    <form  method="POST" id="file">
                    <td id="comment">Enter User Name :</td>
                        <td><input type="text"  name="email"
                                id="usrname" /></td>

                                <td id="comment">Enter password :</td>
                                <td><input type="text"  name="pwd"
                                id="password" /></td>
                

                
                   
                    <td>

                    <div class="form-group">
				<button type="submit" name="login" class="btn btn-success">Login</button>
			</div>
               
             
                    
                        
                    </td>
                </tr>
            </table>
        </div>
               <p>
                    Not a member ?
                    <a href="reg.php" class="to_register"> Go and register. </a>
                </p>
    

</body>
<!--body part ends here-->
</html>