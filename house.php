<?php session_start(); ?>
<?php
//including the database connection file
include_once("connection.php");
 
//fetching data in descending order (lastest entry first)
$resultfree = mysqli_query($mysqli, "SELECT * FROM products where cate='house'");
?>
<html>
<head>
 <title>bechdo | Houses</title>
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
  <form method="post" action="search-database.php">
    <div class="input-group input-group-lg">
      <input type="text" class="form-control" placeholder="Search" name="find" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
 </div>
  
<div class="container">
 <h3 class="text-primary text-left bg-primary">House</h3>
<?php

$total_recs=mysqli_num_rows($resultfree);
	if($total_recs == 0)
	 { 
	 	echo "sorry nothing is posted from free users in this category";	
		exit;	
	 } 
else {

$b=1;
 while($rec=mysqli_fetch_array($resultfree)){?>
<table width="100%" cellspacing="4" cellpadding="4" id="table">
 <div class="panel panel-primary">
    <td colspan="2" class="panel-heading bg-primary text-center"><kbd>Title:</kbd> <span><?php echo $rec['adtitle']; ?></span><br/></td>
        </div>
 
  <tr class="text-center">
    <td colspan="1" rowspan="1" id="adpic"><img src="user_images_products/<?php echo ucwords($rec['image']);?>"
     style="border-radius:15px; width:350px; height:300px; padding:7px; -webkit-box-shadow:  0px 0px 5px 1px #FFD57D;
        
        box-shadow:  0px 0px 5px 1px #FFD57D; "/></td>
    </tr>
	
	
	<div class="panel panel-primary">
    <td colspan="2" class="panel-heading bg-primary text-center"><kbd>Description:</kbd><br><br><span><?php echo $rec['addes']; ?></span><br/></td>
        </div>
	
     <tr>
    <td  class="text-primary bg-success text-center" ><span><h4><kbd>Price</kbd><h4><?php echo $rec['price']; ?></span></td>
    </tr>
	
    <tr>
    <td class="text-primary bg-success text-center"> <span><h4><kbd>Seller Name</kbd><h4><?php echo $rec['name']; ?></span><br/></td>
   
  </tr>
  <tr>
  <td  class="text-primary bg-success text-center"> <span><h4><kbd>Location</kbd><h4><?php echo $rec['location']; ?></span><br/></td>
   
  </tr>
  <tr>
  <tr>
  <td  class="text-primary bg-success text-center"> <span><h4><kbd>Country</kbd><h4><?php echo $rec['country']; ?></span><br/></td>
   
  </tr>
  
  <tr>
  <td  class="text-primary bg-success text-center"> <span><h4><kbd>City</kbd><h4><?php echo $rec['city']; ?></span><br/></td>
   
  </tr>
  

    <td   class="text-primary bg-success text-center"><span><h4><kbd>Mobile Number</kbd><h4><?php echo $rec['phone']; ?></span><br/></td>
   
  </tr>
  
  
		
	
	  
	</table>
<?php $b++; }
}
?>

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