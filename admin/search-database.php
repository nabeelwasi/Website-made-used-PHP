<?php session_start(); 

include_once("connection.php");

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
 <h3 class="text-primary text-left bg-primary">Search Results</h3>
<?php
//If they did not enter a search term we give them an error
$find=$_POST['find'];

if ($find == "")
{
echo "<p>You forgot to enter a search term!!!";
exit;
}

// Otherwise we connect to our Database
mysqli_connect("localhost", "id5262853_bechdo", "pakistan", "id5262853_bechdy") or die(mysql_error());

// We perform a bit of filtering
$find = strtoupper($find);
$find = strip_tags($find);
$find = trim ($find);

//Now we search for our search term, in the field the user specified
$data = mysqli_query($mysqli, "SELECT * FROM login WHERE (username LIKE'%$find%') OR (email LIKE'%$find%') OR (name LIKE'%$find%') OR (phone LIKE'%$find%')");


$total_recs=mysqli_num_rows($data);
	if($total_recs == 0)
	 { 
	 	echo "sorry user not found";	
		exit;	
	 } 
else {

$b=1;
while($result = mysqli_fetch_array($data)){?>
<table width="100%" cellspacing="4" cellpadding="4" id="table">
<h2 class="text-center">User Record Found</h2>
<tr>
    <td class="text-success text-center bg-info"><h4><kbd>Firstname</kbd><h4> <span><?php echo $result['firstname']; ?></span></td>
    </tr>
 
	
    <tr>
    <td  class="text-success text-center bg-info"> <span><h4><kbd>Last Name</kbd><h4><?php echo $result['lastname']; ?></span><br/></td>
   
  </tr>
  <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Name</kbd><h4><?php echo $result['name']; ?></span><br/></td>
   
  </tr>
  
  <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Email</kbd><h4><?php echo $result['email']; ?></span><br/></td>
   
  </tr>
  
  <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Username</kbd><h4><?php echo $result['username']; ?></span><br/></td>
   
  </tr>
   <tr>
    <td  class="text-success text-center bg-info"><span><h4><kbd>Phone</kbd><h4><?php echo $result['phone']; ?></span><br/></td>
   
  </tr>
   <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Address</kbd><h4><?php echo $result['address']; ?></span><br/></td>
   
  </tr>

  <tr class="text-left bg-danger">
  <?php echo "<td><a href=\"delusers.php?id=$result[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Remove User</a></td>"; ?>
  </tr>
  
  <tr>
  <td class="text-center"><a href="admin.php"> <kbd>Back</kbd> </a></td>
  </tr>
	</table>
<?php $b++; }
}
?>

<?php


echo "<b>Searched For:</b> " .$find;
//}
?>



</body>
</html>
