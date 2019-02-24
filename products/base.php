<div class="header bg-dark">
	<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
</div>
<div class="sidebar">
	<button><h3>Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../products/products.php'">Product List</button>
	<button id="sidebar_button" onclick="window.location.href='../products/add_products.php'">Add Products</button>
	<button id="sidebar_button" onclick="window.location.href='../products/import_csv.php'">Import CSV</button>
	<button id="sidebar_button" data-toggle="popover" title="Product Management" data-content="Here you can create, update, delete and view products." data-placement="bottom">Help?</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><img src="../images/reply.svg"></button>
	</div>
</div>