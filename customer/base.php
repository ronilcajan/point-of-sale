<div class="header bg-dark">
	<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
	<div class="w-100" >
  		<form class="form-inline form-group-sm mt-4" method="post" action="search.php?username=<?php echo $_GET['username'];?>">
  			<input class="form-control w-25 mr-1"  type="search" placeholder="Search" aria-label="Search" name="search">
   			<button class="btn btn-secondary my-2 my-sm-0 border" type="submit">Search</button>
  		</form>
	</div>
</div>
<div class="sidebar">
	<button><h3>Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../customer/customer.php?username=<?php echo $_GET['username']; ?>'">List</button>
	<button id="sidebar_button" onclick="window.location.href='../customer/add_customer.php?username=<?php echo $_GET['username'];?>'">Add</button>
	<button id="sidebar_button" type="button" data-toggle="popover" title="Customer Management" data-content="Here you can create, update, delete and view customer profiles." data-placement="bottom">Help?</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php?username=<?php echo $_GET['username'];?>'"><img src="../images/reply.svg"></button>
	</div>
</div>