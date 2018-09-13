<?php session_start();



if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}





//including the database connection file
include_once("connection.php");





//fetching data in descending order (lastest entry first)
$resultusers = mysqli_query($mysqli, "SELECT * FROM login");
$resultpro = mysqli_query($mysqli, "SELECT * FROM products");
$resultadmin = mysqli_query($mysqli, "SELECT * FROM admin");
?>
<html>
<head>
 <title>Ab Joh Chayie Yahan Bech do...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="css/loginreg.css" media="all" rel="stylesheet" type="text/css">
		<link href="css/search.css" media="all" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav">
	 
	 
	
	
	</a></li>
	  <li><a href="logout.php"><?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM admin");
    ?>                
     Logout
        

    <?php    
    } else {
        echo "";
    }
    ?></a></li>
    </ul>
  </div>
</nav>
 </div>



<div class="container">
<div class="page-header">
<h1>Welcome to the <small> | ADMIN PANEL</small></h1>
<h3>Bechdo Admin Portal</h3>
</div>
</div>


<div class="container">
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Users List</a></li>
    <li><a data-toggle="tab" href="#menu1">Products List</a></li>
    <li><a data-toggle="tab" href="#menu2">Add New Admin</a></li>
    <li><a data-toggle="tab" href="#menu3">View Admin Details</a></li>
	 <li><a data-toggle="tab" href="#menu4">Find User</a></li>
    <li><a data-toggle="tab" href="#menu5">Find Product</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Users List</h3>
        <table class="table">
    <tr class="danger">
        <td class="text-primary">Firstname</td>
        <td class="text-primary">Lastname</td>
		<td class="text-primary">Name</td>
        <td class="text-primary">Username</td>
        <td class="text-primary">Email</td>
		<td class="text-primary">Phone</td>
		<td class="text-primary">Address</td>
		<td class="text-primary">Action</td>
    </tr>
	 
   <?php
    while($res = mysqli_fetch_array($resultusers)) {       
        echo "<tr>";
        echo "<td>".$res['firstname']."</td>";
        echo "<td>".$res['lastname']."</td>";
        echo "<td>".$res['name']."</td>";
		echo "<td>".$res['username']."</td>";
        echo "<td>".$res['email']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>".$res['address']."</td>";
        echo "<td><a href=\"editusers.php?id=$res[id]\">Edit</a> | <a href=\"delusers.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";  
    }
    ?> 
</table>  	
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Products List</h3>
     <table class="table">
    <tr class="danger">
        <td class="text-primary">ID</td>
        <td class="text-primary">Ad Title</td>
		<td class="text-primary">Ad Description</td>
        <td class="text-primary">Ad Price</td>
        <td class="text-primary">Seller Name</td>
		<td class="text-primary">Contact</td>
		<td class="text-primary">Category</td>
		<td class="text-primary">Action</td>
    </tr>
	 
   <?php
    while($res = mysqli_fetch_array($resultpro)) {       
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
        echo "<td>".$res['adtitle']."</td>";
        echo "<td>".$res['addes']."</td>";
		echo "<td>".$res['price']."</td>";
        echo "<td>".$res['name']."</td>";
		echo "<td>".$res['phone']."</td>";
		echo "<td>".$res['cate']."</td>";
         echo "<td><a href=\"delproducts.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";  
    }
    ?> 
	</table>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Add New Admin</h3>

	  <form action="addadmin.php" method="post" name="form1" enctype="multipart/form-data">
        <table width="25%" border="0">
		<div class="col-xs-4">
                <label>Admin Name</label>
                <input type="text" class="form-control" name="name">
            </div>
			<br><br><br>
		<div class="col-xs-4">
                <label>Admin Username</label>
                <input type="text" class="form-control" name="username">
            </div>
			<br><br><br>
			<div class="col-xs-4">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
			<br><br><br><br>
			<input type="submit" name="Submit" class="btn btn-primary" value="Insert Admin">
            
        </table>
    </form>
	  
	  
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>View Admin Details</h3>
   
   <h3>Admins List</h3>
     <table class="table">
    <tr class="danger">
        <td class="text-primary">ID</td>
		<td class="text-primary">Admin Name</td>
        <td class="text-primary">Admin Username</td>
		<td class="text-primary">Admin Password</td>
		<td class="text-primary">Action</td>
    </tr>
	 
   <?php
    while($res = mysqli_fetch_array($resultadmin)) {       
        echo "<tr>";
        echo "<td>".$res['id']."</td>";
		echo "<td>".$res['name']."</td>";
        echo "<td>".$res['username']."</td>";
		echo "<td>".$res['password']."</td>";
        echo "<td><a href=\"deladmins.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";  
    }
    ?> 
	</table>
   
    </div>
	
	<div id="menu4" class="tab-pane fade">
      
	  <div class="container">
	  <h2 class="text-primary">Search User Details</h2>
   <div  class="panel-footer">
 <form name="search" class="example" method="post" action="search-database.php">
  <input type="text" class="form-control" placeholder="" name="find">
  <br>
  <div class="form-group">
  <label for="sel1"></label>
  <select class="col-xs-4" class="form-control" id="sel1">
    <option>Name</option>
    <option>Username</option>
    <option>Email</option>
  </select>
</div>
<br>
  <button type="submit"><i class="fa fa-search">Search</i></button>
</form>
 </div>
 </div>
	  
	
	  
	  
	  
	  
	  </div>
	  <div id="menu5" class="tab-pane fade">
      <div class="container">
	  <h2 class="text-primary">Search Product Details</h2>
   <div  class="panel-footer">
 <form name="search" class="example" method="post" action="search-database1.php">
  <input type="text" placeholder="" class="form-control" name="find">
  <br>
  <div class="form-group">
  <label for="sel1"></label>
  <select class="col-xs-4" class="form-control" id="sel1">
    <option>ID</option>
    <option>AD Title</option>
    <option>AD Description</option>
  </select>
</div>
<br>
  <button type="submit"><i class="fa fa-search">Search</i></button>
</form>
 </div>
 </div>
	  </div>
	
  </div>
</div>







   
</body>
</html>