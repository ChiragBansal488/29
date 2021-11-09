<ul class="nav navbar-nav">

	
		<li><a href="invoice_list.php">Invoice List</a></li>
		<li><a href="create_invoice.php">Create Invoice</a></li>				  
	

<?php 
if($_SESSION['userid']) { ?>
	
		
			<li><a href="action.php?action=logout">Logout</a></li>		  
			
<?php } ?>
</ul>
<br /><br /><br />