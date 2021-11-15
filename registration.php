
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Registration form </title>
<link rel="stylesheet" type="text/css" href="style2.css">
 <script src="validation.js"></script>

</head>
 
<body >
 <div class="contaier"id="console"  >
<form name="login"  action="reg_login.php" method="post">
<h2>Registration Form</h2>
 
<label  >Your Name :</label>
<input type="text" id="fn" name="first_name" ><br/>
<br>
<label  >Email :</label>
<input type="text" style="text-transform:lowercase" placeholder="Abc@gmail.com" name="email" id="em" required ><br/>
<br>
<label >Address :</label>
<input type="text"   name="address" id="add" required><br/>
<br>
<label   >Mobile No :</label>
<input type="number" id="mn" name="mobile"required ><br/>
 <br>
<label  >Password :</label>
<input type="password" id="pwd" placeholder="eg. Abc@1" name="password" ><br/>
<br>
 
<button type="submit" value="Submit" name="register" id="button" onclick="valid()" >Register</button>  
<p>
  
    <a href="index.php" class="to_register"> Go and log in </a>
</p>
</div>


</form>

 
</body>
</html>

