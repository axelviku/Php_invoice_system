<?php 
session_start();
include('inc/header.php');
include_once('messg.php');  
include_once('dbFunction.php'); 
include_once('displayMsg.php');
$invoice = new Invoice();
$funObj1 = new messages();
$invoice->checkLoggedIn();
if(!empty($_POST['invoice_btn']))
{  
	if(!empty($_POST['companyName']) && ($_POST['address'])) 
	{	
		$invoice->saveInvoice($_POST);
		echo $success11;
    }else {
	        echo $create_invoice_error;
          }
}	else{
	echo $info;
	}
?>
<title>Create invoice:- Invoice System</title>
<script src="js/invoice.js"></script>
<link href="style.css" rel="stylesheet">
<div class="container content-invoice">
	<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title">Viku Invoice System</h2>
					<li class="list-group-item list-group-item-light navbar-text navbar-right">Logged in <?php echo $_SESSION['user']; ?></li>
					<?php include('menu.php');?>	
				</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<h3>From,</h3>
					<?php echo $_SESSION['user']; ?><br>	
					<?php echo $_SESSION['address']; ?><br>	
					<?php echo $_SESSION['mobile']; ?><br>
					<?php echo $_SESSION['email']; ?><br>	
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3>To,</h3>
					<div class="form-group">
						<input type="text" class="form-control" onkeypress="return /[a-z]/i.test(event.key)" name="companyName" id="companyName" placeholder="Receiver Name" autocomplete="off">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"></textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<table class="table table-bordered table-hover" id="invoiceItem">	
						<tr>
							<th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
							<th width="15%">Item No</th>
							<th width="38%">Item Name</th>
							<th width="15%">Quantity</th>
							<th width="15%">Price</th>												
							<th width="15%">Total</th>
						</tr>							
						<tr>
							<td><input class="itemRow" type="checkbox"></td>
							<td><input type="number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" id ="prd" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off" required></td>
							<td><input type="text" name="productName[]" onkeypress="return /[a-z]/i.test(event.key)" id="productName_1" class="form-control" autocomplete="off" required></td>			
							<td><input type="number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" name="quantity[]" id="quantity_1" maxlength="2" pattern="^0[1-9]|[1-9]\d$" class="form-control quantity" autocomplete="off" required></td>
							<td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off" required></td>
							<td><input name="total[]" id="total_1" class="form-control total" autocomplete="off" readonly required></td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
					<button class="btn btn-success" id="addRows" type="button">+ Add More</button>
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success">						
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">???</div>
								<input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal" readonly>
							</div>
						</div>
						<div class="form-group">
							<label>Tax Rate: &nbsp;</label>
							<div class="input-group">
								<input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<div class="input-group-addon">%</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tax Amount: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">???</div>
								<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount" readonly>
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp;</label>
							<div class="input-group">
								<div class="input-group-addon currency">???</div>
								<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total" readonly>
							</div>
						</div>
					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>			
</div>
</div>	

<?php include('inc/footer.php');?>