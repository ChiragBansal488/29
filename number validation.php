
<!--Database Connection>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
include 'insert.php';
?>
<-- Html code--> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
  <script src="validate.js"></script>
   </head>



<body>
    <p id="demo"></p>

  
    <div id="demo">
        <div class="register">
            <h2>Login Page </h2>
        </div>

        

        <!--BUTTON SECTION -->

        <div class="login">
            <table cellspacing="2" align="center" >
                <tr>
                    <td id="comment">Enter Phone Number :</td>

                    <form action="insert.php" method="POST" id="file">
                        <td><input type="text"  name="validation"
                                id="validations" /></td>
</div>                
                </tr>

                <tr>
                   
                    <td>


                        </form>
                        <input type="button" value="Submit" onclick="validate(validations) ;illegalCharacter(validations)" class="btn" />
                      
                    </td>
                </tr>
            </table>


</body>



<!--body part ends here-->

</html>
