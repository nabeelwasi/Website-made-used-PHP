<?php include 'databaseadmin.php';
?>
<?php
 
// create a variable
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];

 
//Execute the query
 
mysqli_query($connect, "INSERT INTO admin(username,password,name)
 VALUES('$username','$password','$name')");	
	
 if(mysqli_affected_rows($connect) > 0){
 echo '<script>
  window.location.href = "admin.php";
</script>';    
 
} else {
 echo "Admin NOT Added<br />";
 echo mysqli_error ($connect);
}
	

	
	
		echo '<script>
  window.location.href = "admin.php";
</script>';        
?>