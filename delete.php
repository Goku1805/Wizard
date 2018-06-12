<?php
$conn=mysqli_connect('127.0.0.1','root','','link');
if(isset($_GET['del'])){
	$del_id=$_GET['del'];
	$query = "DELETE from url WHERE id = $del_id";
	if($result = mysqli_query($conn,$query)){
		echo "Deleted";
		header("Refresh: 1; url=index.php");
	}
	
}

?>