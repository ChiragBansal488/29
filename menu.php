<ul class="nav navbar-nav flex-row">
<li class="">

	<span class="caret"></span></button>
	
		<li><a class="" href="invoice_list.php">Invoice List</a></li>
		<li><a class="" href="create_invoice.php">Create Invoice</a></li>				  
	
</li>
<?php 
if($_SESSION['userid']) { ?>
	<li class="">
	
		<span class="caret"></span></button>
		
			<li><a class="" href="#">Account</a></li>
			<li><a class="" href="action.php?action=logout">Logout</a></li>	
			<br>
			Login username is: <?php echo $_SESSION['user']; ?>	  
		
	</li>
<?php } ?>
</ul>
<br /><br /><br /><br />