<?php 
session_start();
include('header.php');
include_once('dispMsg.php');
$funObj1 = new messages();
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Invoice.php';
	$invoice = new Invoice();
	$user = $invoice->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:invoice_list.php");
	} else {
		echo $funObj1->error("Invalid email or password");

	}
}
?>
<title>Invoice System</title>
<script src="js/invoice.js"></script>
<link rel="stylesheet" href="style2.css">
<script src="reg_validation.js"></script>

<style type="text/css">
	.form-control {
     
    height: 26px;
    border-radius: 16px;
    border: none;
    padding-left: 1.5rem;
    padding-right: 0.5rem;
    margin-top: 1.5rem;
    background: rgb(213, 211, 222);
}
</style>

	<div class="login-form">		
		<h1> Login page:</h1>		
     
		<form method="post" action="">
			<div class="form-group">
		
			</div>
			<div id="form-group">
				<input name="email" id="email" type="email" id="form-control" placeholder="Email"  required>
			</div>
            <br>
			<div id="form-group">
				<input type="password" id="form-control" name="pwd" placeholder="Password"  required>
			</div>  
            <br>
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-success">Login</button>
			</div>
			<p>
                   
                    <a href="r.php" class="to_register"> New register. </a>
                </p>
		</form>
		<br>
		<br>

	</div>		
</div>		
</div>
<?php include('footer.php');?>


