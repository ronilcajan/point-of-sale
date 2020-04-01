<div class="header bg-dark">
	<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
</div>
<div class="sidebar">
	<button><h3><i class="fas fa-tachometer-alt"></i> Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/delivery.php'"><i class="fas fa-hands-helping"></i> Transaction Details</button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/add_delivery.php'"><i class="fas fa-truck"></i> Add Deliveries</button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/import_csv.php'"><i class="fas fa-file-upload"></i> Import CSV</button>
	<button id="sidebar_button" data-toggle="popover" title="Product Deliveries" data-content="After the textbox is filled, Please click the Buy Price Textbox and Tax Rate(%) Textbox to get the Sell Price Value. " data-placement="bottom"><i class="fas fa-question"></i> Help</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><i class="fas fa-arrow-alt-circle-left"></i> Back</button>
	</div>
</div>