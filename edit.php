<?php
// including the database connection file
include_once("connection.php");
 
 if(isset($_POST['update'])) { 
 $id = $_POST['id'];
    $adtitle = $_POST['adtitle'];
    $addes = $_POST['addes'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$price = $_POST['price'];
	
if(empty($name) || empty($addes) || empty($adtitle)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($addes)) {
            echo "<font color='red'>Ad Description field is empty.</font><br/>";
        }
        
        if(empty($adtitle)) {
            echo "<font color='red'>Ad Title field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE products SET name='$name', addes='$addes', price='$price', phone='$phone', adtitle='$adtitle' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: myaccount.php");
    }
}
?>	
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $adtitle = $res['adtitle'];
    $addes = $res['addes'];
    $name = $res['name'];
	$price = $res['price'];
    $phone = $res['phone'];
       
}
?>	


<html>
<html>
<head>
 <title>bechdo | Edit Ad...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/loginreg.css" media="all" rel="stylesheet" type="text/css">
	<link href="css/search.css" media="all" rel="stylesheet" type="text/css">
</head>
 
<body>


<div class="container">
<form name="form1" method="post" action="edit.php">
        <table border="0">
		<h3 class="text-primary text-center bg-primary"> Change Ad Information</h3>
		<div class="form-group">
                <label>Ad Title</label>
                <input type="text" class="form-control" name="adtitle"value="<?php echo $adtitle;?>">
            </div>
			
			<div class="form-group">
                <label>Ad Description</label>
                <input type="textarea" class="form-control" rows="8" name="addes" value="<?php echo $addes;?>">
				 </div>
		
			<div class="form-inline">
                <label>Seller Name</label>
				<br>
                <input type="text" class="form-control" name="name"value="<?php echo $name;?>">
            </div>
			
		<div class="form-inline">

                <label>Seller Phone</label>
				<br>
              <input type="text" class="form-control" name="phone"value="<?php echo $phone;?>">
            </div>
		
			<div class="form-inline">

                <label>Price</label>
				<br>
                  <input type="text" class="form-control" name="price"value="<?php echo $price;?>">
            </div>

			<div class="form-inline">

                <label>Phone</label>
				<br>
               <input type="text" class="form-control" name="phone"value="<?php echo $phone;?>">
            </div>

			
		
		
                <input type="submit" name="update" class="btn btn-primary" value="Update Details">
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
               
            </tr>
        </table>
    </form>
</div>