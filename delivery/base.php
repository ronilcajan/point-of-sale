<div class="header bg-dark">
	<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
</div>
<div class="sidebar">
	<button><h3>Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/delivery.php'">Transaction Details</button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/add_delivery.php'">Add Deliveries</button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/import_csv.php'">Import CSV</button>
	<button id="sidebar_button" data-toggle="popover" title="Product Deliveries" data-content="After the textbox is filled, Please click the Buy Price Textbox and Tax Rate(%) Textbox to get the Sell Price Value. " data-placement="bottom">Help?</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><img src="../images/reply.svg"></button>
	</div>
</div>