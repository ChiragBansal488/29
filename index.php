<?php 
session_start();
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
    include_once('messg.php'); 
	$invoice = new Invoice();
    $funObj1 = new messages();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:invoice_list.php? 'Welcome to invoice system");
	} else {
        echo $funObj1->error('Invalid email or password!!!');
	}
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <title>Login Invoice System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container ol-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto form p-4 css">

        <!-- <h2>Login here</h2> -->
        <div class="login-form">
            <h4>Invoice User Login</h4>
            <form method="post" action="">
                <div class="form-group">
                    <input name="email" id="email" type="email" class="form-control" placeholder="Email address"
                        autofocus="" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login" class="btn btn-info">Login</button>
                </div>
                <p>
                    Not a member yet ?
                    <a href="reg.php">Join us</a>
                </p>
            </form>
            <br>
        </div>

    </div>
    <script src="js/invoice.js"></script>
    <?php include('inc/footer.php');?>
</body>

</html>