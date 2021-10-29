<?php 
  $db = mysqli_connect('localhost', 'root', '', 'newdb');
  $username = "";
  

  if (isset($_POST['username'])) {
  	 $username = $_POST['username'];
    


  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	
  	$res_u = mysqli_query($db, $sql_u);

  	if (mysqli_num_rows($res_u) > 0) {
      echo 'enter username is already taken';	
  		
  	}else{
           $query = "INSERT INTO users (username) 
      	    	  VALUES ('$username')";
           $results = mysqli_query($db, $query);
           echo 'Saved!';
           exit();
  	}
  }
?>