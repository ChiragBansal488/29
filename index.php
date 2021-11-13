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

<style type="text/css">
	.form-control {
    height: 26px;
    border-radius: 26px;
    border: none;
    padding-left: 1.5rem;
    padding-right: 0.5rem;
    margin-top: 1.5rem;
    background: rgb(213, 211, 222);
}
</style>

	<div class="login-form">		
		<h4> Login page:</h4>		
		<form method="post" action="">
			<div class="form-group">
		
			</div>
			<div class="form-group">
				<input name="email" id="email" type="email" class="form-control" placeholder="Email"  required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pwd" placeholder="Password"  required>
			</div>  
			<div class="form-group">
				<button type="submit" name="login" class="btn btn-success">Login</button>
			</div>
			<p>
                   
                    <a href="reg.php" class="to_register"> New register. </a>
                </p>
		</form>
		<br>
		<br>

	</div>		
</div>		
</div>
<?php include('footer.php');?>