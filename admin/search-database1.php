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
$data = mysqli_query($mysqli, "SELECT * FROM products WHERE (id LIKE'%$find%') OR (adtitle LIKE'%$find%') OR (addes LIKE'%$find%') ");


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
<h2 class="text-center">Products Record Found</h2>
<tr>
    <td class="text-success text-center bg-info"><h4><kbd>ID</kbd><h4> <span><?php echo $result['id']; ?></span></td>
    </tr>
 
	
    <tr>
    <td  class="text-success text-center bg-info"> <span><h4><kbd>Ad Title</kbd><h4><?php echo $result['adtitle']; ?></span><br/></td>
   
  </tr>
  <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Ad Description</kbd><h4><?php echo $result['addes']; ?></span><br/></td>
   
  </tr>
  
  <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Ad Price</kbd><h4><?php echo $result['price']; ?></span><br/></td>
   
  </tr>
  
  <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Seller Name</kbd><h4><?php echo $result['name']; ?></span><br/></td>
   
  </tr>
   <tr>
    <td  class="text-success text-center bg-info"><span><h4><kbd>Contact</kbd><h4><?php echo $result['phone']; ?></span><br/></td>
   
  </tr>
   <tr>

    <td  class="text-success text-center bg-info"><span><h4><kbd>Category</kbd><h4><?php echo $result['cate']; ?></span><br/></td>
   
  </tr>
  <tr class="text-left bg-danger">
  <?php echo "<td><a href=\"delproducts.php?id=$result[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Remove Product</a></td>"; ?>
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
