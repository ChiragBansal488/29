$(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_'+count+'"> <label class="custom-control-label" for="itemRow_'+count+'"></label> </div></td>';          
		htmlRows += '<td><input type="text" name="productCode[]" id="productCode_'+count+'" class="form-control" autocomplete="off"></td>';          
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" pattern="[0-9]+(\.[0-9]{1,2})" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);
	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		var a = $('#price_'+count).val();
		$('#price_'+count).val(parseFloat(a).toFixed(2));
		calculateTotal();
	});		
	$(document).on('blur', "#taxRate", function(){		
		calculateTotal();
	});	
	$(document).on('blur', "#amountPaid", function(){
		var amountPaid = $(this).val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {
			$('#amountDue').val(totalAftertax);
		}	
	});	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});
});	
function calculateTotal(){
	var totalAmount = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total).toFixed(2));
		totalAmount += total;			
	});
	$('#subTotal').val(parseFloat(totalAmount).toFixed(2));	
	var taxRate = $("#taxRate").val();
	var subTotal = $('#subTotal').val();	
	if(subTotal) {
		var taxAmount = subTotal*taxRate/100;
		var n = parseFloat(taxAmount).toFixed(2);
		$('#taxAmount').val(n);
		subTotal = parseFloat(subTotal)+parseFloat(n);
		$('#totalAftertax').val(subTotal);		
		var amountPaid = $('#amountPaid').val();
		var totalAftertax = $('#totalAftertax').val();	
		if(amountPaid && totalAftertax) {
			totalAftertax = totalAftertax-amountPaid;			
			$('#amountDue').val(totalAftertax);
		} else {		
			$('#amountDue').val(subTotal);
		}
	}
}


 $( function() {
 $('.two-digits').keyup(function(){
   if($(this).val().indexOf('.')!=-1){         
       if($(this).val().split(".")[1].length > 2){                
           if( isNaN( parseFloat( this.value ) ) ) return;
           this.value = parseFloat(this.value).toFixed(2);
       }  
    }            
    return this; //for chaining
 });
});

$(document).ready(function() {
	$("#quantity_1,#prd").keypress(function(e) {
	  var length = this.value.length;
	  if (length >= 10) {
		e.preventDefault();
		alert("Not allow more than 10 character");
	  }
	});

	$("#price_1,#productName_1").keypress(function(e) {
		var length = this.value.length;
		if (length >= 20) {
		  e.preventDefault();
		  alert("Not allow more than 20 character");
		}
	  });
	  $("#companyName").keypress(function(e) {
		var length = this.value.length;
		if (length >= 40) {
		  e.preventDefault();
		  alert("Not allow more than 40 character");
		}
	  });
	  $("#address").keypress(function(e) {
		var length = this.value.length;
		if (length >= 50) {
		  e.preventDefault();
		  alert("You Limit is over ");
		}
	  });
  });
