<?php session_start();
 
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

 
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) { 
    $target = "user_images_products/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $adtitle = $_POST['adtitle'];
	$addes = $_POST['addes'];
	$phone = $_POST['phone'];
    $loginId = $_SESSION['id'];
	$cate = $_POST['cate'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$location = $_POST['location'];
        
    // checking empty fields
    if(empty($adtitle) || empty($price) || empty($phone)) {                
        if(empty($adtitle)) {
           echo '<script type="text/javascript">alert("Please Fill Ad Title");</script>';
        }
        
        if(empty($price)) {
           echo '<script type="text/javascript">alert("Please Fill Ad Price");</script>';
        }
        
        if(empty($phone)) {
            echo '<script type="text/javascript">alert("Please Fill Ad Phone");</script>';
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO products(image, name, price, login_id, adtitle, addes, phone, cate, city, country, location) VALUES('$image','$name','$price', '$loginId', '$adtitle', '$addes','$phone','$cate', '$city','$country','$location')");
        
		move_uploaded_file($_FILES['image']['tmp_name'], $target);
		
		
        //display success message
		echo '<script>
  window.location.href = "admsg.php";
</script>';        
    }
}
	
	

?>