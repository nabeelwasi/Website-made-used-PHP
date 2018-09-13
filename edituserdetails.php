<?php session_start();
 

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}


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
	$country = $_POST['country'];
	$city = $_POST['city'];
	
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
        $result = mysqli_query($mysqli, "UPDATE login SET name='$name', username='$username', firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', address='$address', city='$city', country='$country' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is view.php
        header("Location: myaccount.php");
    }
}


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
	   $city = $res['city'];
	$country = $res['country'];
   
}
?>	

 

<html>
<html>
<head>
 <title>bechdo | Edit Details...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="css/loginreg.css" media="all" rel="stylesheet" type="text/css">
	<link href="css/search.css" media="all" rel="stylesheet" type="text/css">
</head>
 
<body>



<div class="container">
 <div class="page-header">
  <h1>Bech.do</h1>
</div></div>

 <div class="container">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Becho.do</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="contactus.html">Contact US</a></li>
      <li><a href="myaccount.php">My Account</a></li>
	  <li><a href="newad.html">
	  <?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>   
	Post a new ad ?
	 <?php    
    } else {
        echo "";
    }
    ?>
	  
	  </a></li>
	  <li><a href="myaccount.php"><?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>   
My Ads
        

    <?php    
    } else {
        echo "";
    }
    ?></a></li>

	<a><li><?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>                
        Welcome <?php echo $_SESSION['name'] ?>
		<?php    
    } else {
        echo "";
    }
    ?></a></li>
	
	</a></li>
	  <li><a href="logout.php"><?php
    if(isset($_SESSION['valid'])) {            
        include("connection.php");                    
        $result = mysqli_query($mysqli, "SELECT * FROM login");
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
<form name="form1" method="post" action="edituserdetails.php">
        <table border="0">
		<h3 class="text-primary text-center bg-primary"> Change User Information</h3>
		<div class="form-inline">
		
		
                <label>Name</label>
				<br>
                <input type="text" class="form-control" name="name"value="<?php echo $name;?>">
            
			</div>
		<br>
		<div class="form-inline">
                <label>Username</label>
				
			
				<br>
                 <input type="text" class="form-control" name="username"value="<?php echo $username;?>">
            </div><br>
		
			<div class="form-inline">
                <label>Firstname</label>
				<br>
                <input type="text" class="form-control" name="firstname"value="<?php echo $firstname;?>">
            </div>
		<br>
			<div class="form-inline">
                <label>Lastname</label>
				<br>
              <input type="text" class="form-control" name="lastname"value="<?php echo $lastname;?>">
            </div>
			<br>
			<div class="form-inline">
                <label>Email</label>
				<br>
                  <input type="text" class="form-control" name="email"value="<?php echo $email;?>">
            </div>
	<br>
			<div class="form-inline">
                <label>Phone</label>
				<br>
               <input type="text" class="form-control" name="phone"value="<?php echo $phone;?>">
            </div>
			<br>
	
			<div class="form-inline">
                <label>Address</label>
				<br>
                  <input type="text" class="form-control" name="address"value="<?php echo $address;?>">
            </div>
			
			<br>
			<div class="form-inline">
					<label>Select Country</label>	
<br>					
  <select class="form-control" name="country">
   <option value="none">Select Country</option>
    <option value="pak">Pakistan</option>
    <option value="ind">India</option>
    <option value="sl">Srilanka</option>
    <option value="us">United States</option>
  </select>
</div><br>

<div class="form-inline">
					<label>Select City</label>				
					<br>
  <select class="form-control" name="city">
   <option value="none">Select City</option>
    <option value="kar">karachi</option>
    <option value="lah">lahore</option>
    <option value="isl">islamabad</option>
    <option value="hyd">hyderabad</option>
	 <option value="suk">sukkar</option>
    <option value="lar">larkana</option>
    <option value="fai">faisalabad</option>
    <option value="naw">nawab shah</option>
  </select>
</div><br>
		
		
                <input type="submit" name="update" class="btn btn-primary" value="Update Details">
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
               
            </tr>
        </table>
    </form>
</div>
<div class="container">
  
  <footer>
     <div class="container">
       <div class="row">
       
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="adress">
                         <span>Contact Us</span>    
                         <li>
                            <p>Indus University Karachi Pakistan</p>
                          </li>
                               
                          <li>
                            <p>+92 333 0260580</p>
                          </li>
                               
                          <li>
                            <p>contactus@bechdo.com</p>
                          </li>
                     </ul>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="contact">
                         <span>Ads</span>    
                         <li>
                            <a href="mobile.php">Mobiles</a>
                          </li>
                               
                          <li>
                             <a href="car.php">Cars</a>
                          </li>
                               
                          <li>
                            <a href="bike.php">Bikes</a>
                          </li>
                               
                          <li>
                             <a href="house.php">Houses</a>
                          </li>
                               
                          <li>
                            <a href="cloth.php">Cloths</a>
                         </li>
                    </ul>
                </div>
                
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="contact">
                         <span>Bechdo..</span>    
                         <li>
                            <a href="tou.php">Terms of Use</a>
                          </li>
                               
                          <li>
                             <a href="contactus.php">Help & Contact Us</a>
                          </li>
                               
                          <li>
                            <a href="happyusers.php">Our Happy Users</a>
                          </li>
                      
                    </ul>
                </div>
           
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                   <ul class="social">
                              <span>Join.....</span>    
							  <br>
                               <li>
                                    <a href="login.php"><i>Login</i></a>
                               </li>
                              <Br>
                               <li>
                                    <a href="login.php"><i>Register</i></a>
                               </li>
                                
                               <li>
                                    <a href="#"><i class="fa fa-linkedin fa-2x"></i></a>
                               </li>
                               
                               <li>
                                    <a href="#"><i class="fa fa-tumblr fa-2x"></i></a>
                               </li>
                                
                               <li>
                                    <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
                              </li>
                              
                     </ul>
               </div>
           
           
        </div> 
    </div>
 </footer>

</body>
	
</html>	
	
	