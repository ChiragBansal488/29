<?php
// class invoice
class Invoice{
	// database connection function
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "simpleinvoicephp";   
	private $invoiceUserTable = 'invoice_user';	
    private $invoiceOrderTable = 'invoice_order';
	private $invoiceOrderItemTable = 'invoice_order_item';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}

	// user registration function
	public function UserRegister($username, $email, $password, $phonenum,$address){   
		$qr = mysqli_query($this->dbConnect,"INSERT INTO invoice_user(first_name, email, password, mobile,address) values('".$username."','".$email."','".$password."','".$phonenum."','".$address."')");  
		return $qr;   
}  
// password check function
public function pass_Check($password){
	$passLenght = 6;
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);
	
	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < $passLenght) {
		 return false;
	}else{
		return true;
	}
}

// phone number validation function
public function validating($phonenum){
	$valid_number = filter_var($phonenum, FILTER_SANITIZE_NUMBER_INT);
	$valid_number = str_replace("-", "", $valid_number);
	$valid_number = str_replace("+", "", $valid_number);
	if (strlen($valid_number) < 10 || strlen($valid_number) >= 12) 
	{
	  return false;
	} else 
	{
	 return true;
	}
}
// Empty check function
public function emptyField($username,$email,$password,$phonenum, $address){
		if(strlen(!$username || !$email || !$password || !$phonenum || !$address) == 0){
			return true;
		}else{
			return false;
		}
	}
	// duplicate check function
	public function isUserExist($email){  
		$qr = mysqli_query($this->dbConnect,"SELECT * FROM invoice_user WHERE email = '".$email."'");  
		$row = mysqli_num_rows($qr);  
		if($row > 0){  
			return true;  
		} else {  
			return false;  
		}  
	} 
	// login function
	public function loginUsers($email, $password){
		$sqlQuery = "
			SELECT id, email, first_name, last_name, address, mobile 
			FROM ".$this->invoiceUserTable." 
			WHERE email='".$email."' AND password='".$password."'";
        return  $this->getData($sqlQuery);
	}	
	// session check function
	public function checkLoggedIn(){
		if(!$_SESSION['userid']) {
			header("Location:index.php");
		}
	}		
	// invoice saving function
	public function saveInvoice($POST) {		
		$sqlInsert = "INSERT INTO ".$this->invoiceOrderTable."(user_id, order_receiver_name, order_receiver_address, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax, order_amount_paid, order_total_amount_due, note) VALUES ('".$POST['userId']."', '".$POST['companyName']."', '".$POST['address']."', '".$POST['subTotal']."', '".$POST['taxAmount']."', '".$POST['taxRate']."', '".$POST['totalAftertax']."', '".$POST['amountPaid']."', '".$POST['amountDue']."', '".$POST['notes']."')";		
		mysqli_query($this->dbConnect, $sqlInsert);
		$lastInsertId = mysqli_insert_id($this->dbConnect);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) VALUES ('".$lastInsertId."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}       	
	}	
	// update invoice function
	public function updateInvoice($POST) {
		if($POST['invoiceId']) {	
			$sqlInsert = "UPDATE ".$this->invoiceOrderTable." 
				SET order_receiver_name = '".$POST['companyName']."', order_receiver_address= '".$POST['address']."', order_total_before_tax = '".$POST['subTotal']."', order_total_tax = '".$POST['taxAmount']."', order_tax_per = '".$POST['taxRate']."', order_total_after_tax = '".$POST['totalAftertax']."', order_amount_paid = '".$POST['amountPaid']."', order_total_amount_due = '".$POST['amountDue']."', note = '".$POST['notes']."' 
				WHERE user_id = '".$POST['userId']."' AND order_id = '".$POST['invoiceId']."'";		
			mysqli_query($this->dbConnect, $sqlInsert);	
		}		
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {			
			$sqlInsertItem = "INSERT INTO ".$this->invoiceOrderItemTable."(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
				VALUES ('".$POST['invoiceId']."', '".$POST['productCode'][$i]."', '".$POST['productName'][$i]."', '".$POST['quantity'][$i]."', '".$POST['price'][$i]."', '".$POST['total'][$i]."')";			
			mysqli_query($this->dbConnect, $sqlInsertItem);			
		}       	
	}	
	// invoice order table
	public function getInvoiceList(){
		$sqlQuery = "SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."'";
		return  $this->getData($sqlQuery);
	}	
	public function getInvoice($invoiceId){
		$sqlQuery = "SELECT * FROM ".$this->invoiceOrderTable." 
			WHERE user_id = '".$_SESSION['userid']."' AND order_id = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);	
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}	
	//invoice item function
	public function getInvoiceItems($invoiceId){
		$sqlQuery = "SELECT * FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '$invoiceId'";
		return  $this->getData($sqlQuery);	
	}
	//delete invoice item function
	public function deleteInvoiceItems($invoiceId){
		$sqlQuery = "DELETE FROM ".$this->invoiceOrderItemTable." 
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);				
	}
	public function deleteInvoice($invoiceId){
		$sqlQuery = "DELETE FROM ".$this->invoiceOrderTable." 
			WHERE order_id = '".$invoiceId."'";
		mysqli_query($this->dbConnect, $sqlQuery);	
		$this->deleteInvoiceItems($invoiceId);	
		return 1;
	}
}
?>