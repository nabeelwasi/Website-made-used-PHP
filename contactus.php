<?php session_start();
 
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
 


//including the database connection file
include_once("connection.php");
  

if(isset($_POST['Submit'])) { 
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$ad = $_POST['ad'];
	$msg = $_POST['msg'];

        
    // checking empty fields
    if(empty($email) || empty($subject) || empty($msg)) {                
        if(empty($email)) {
           echo '<script type="text/javascript">alert("Please Fill Email");</script>';
        }
        
        if(empty($subject)) {
           echo '<script type="text/javascript">alert("Please Fill Subject");</script>';
        }
        
        if(empty($msg)) {
            echo '<script type="text/javascript">alert("Please Fill Msg");</script>';
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($mysqli, "INSERT INTO contactus(subject, phone, msg, ad, email) VALUES('$subject','$phone','$msg', '$ad', '$email')");
        
		
		
        //display success message
		echo '<script>
  window.location.href = "contactmsg.php";
</script>';        
    }
}
	
	

?>