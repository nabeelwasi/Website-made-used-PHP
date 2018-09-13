<?php
// including the database connection file
include_once("connection.php");
 
 if(isset($_POST['update'])) { 
 $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
    $address = $_POST['address'];
	$name = $_POST['name'];
	
if(empty($name) || empty($username) || empty($email)) {                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($username)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE login SET name='$name', username='$username', firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', address='$address' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: admin.php");
    }
}
?>	
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM login WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
    $username = $res['username'];
    $firstname = $res['firstname'];
	$lastname = $res['lastname'];
    $phone = $res['phone'];
    $address = $res['address'];
	$email = $res['email'];
   
}
?>	


<html>
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
<form name="form1" method="post" action="editusers.php">
        <table border="0">
		<h3 class="text-primary text-center bg-primary"> Change User Information</h3>
		<div class="col-xs-4">
                <label>Name</label>
                <input type="text" class="form-control" name="name"value="<?php echo $name;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
			<div class="col-xs-4">
                <label>Username</label>
                 <input type="text" class="form-control" name="username"value="<?php echo $username;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
			<div class="col-xs-4">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname"value="<?php echo $firstname;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
			<div class="col-xs-4">
                <label>Lastname</label>
              <input type="text" class="form-control" name="lastname"value="<?php echo $lastname;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
			<div class="col-xs-4">
                <label>Email</label>
                  <input type="text" class="form-control" name="email"value="<?php echo $email;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
			<div class="col-xs-4">
                <label>Phone</label>
               <input type="text" class="form-control" name="phone"value="<?php echo $phone;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
			<div class="col-xs-4">
                <label>Address</label>
                  <input type="text" class="form-control" name="address"value="<?php echo $address;?>">
            </div>
			<br>
			<br>
			<br>
			<br>
		
		
                <input type="submit" name="update" class="btn btn-primary" value="Update Details">
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
               
            </tr>
        </table>
    </form>
</div>