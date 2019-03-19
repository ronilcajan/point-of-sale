<div class="header bg-dark">
	<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
</div>
<div class="sidebar">
	<button><h3><i class="fas fa-tachometer-alt" style="color:#2196F3"></i> Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../cashflow/cashflow.php'"><i class="fas fa-spinner fa-pulse" style="color:#2196F3"></i> List</button>
	<button id="sidebar_button" onclick="window.location.href='../cashflow/add_cash.php'" ><i class="fas fa-money-bill-alt" style="color:#2196F3"></i> Add Cash-in/Cash-out</button>
	<button id="sidebar_button" type="button" data-toggle="popover" title="Cash Management" data-content="Here you can view cash flow of the store." data-placement="bottom"><i class="fas fa-question" style="color:#2196F3"></i> Help</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><i class="fas fa-backward" style="color:#2196F3"></i> Back</button>
	</div>
</div>