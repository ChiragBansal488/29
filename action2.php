<?php 
session_start();
  $db = mysqli_connect('localhost', 'root', '', 'newdb');
  $username = "";
  

  if (isset($_POST['username'])) {
  	 $username = $_POST['username'];
    


  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	
  	$res_u = mysqli_query($db, $sql_u);

  	if (mysqli_num_rows($res_u) > 0) {
      echo '<script>
      alert("username already exist");
      window.location="index.php";
      
      </script>';
       exit();
  		
  	}else{
           $query = "INSERT INTO users (username) 
      	    	  VALUES ('$username')";
           $results = mysqli_query($db, $query);
           $_SESSION['username'] = $username;
           echo '<script>

           window.location="welcome.php";
           
           </script>';
      
           exit();
  	}
  }
?>