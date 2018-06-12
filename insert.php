<?php


$con = mysqli_connect("127.0.0.1","root","");
if(!$con){
	echo "Not connected to server";
}
if(!mysqli_select_db($con,'link')){
	echo "Database not selected";
}
$url = $_POST['q'];
if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
	echo 'Not a valid URL';
	header("Refresh: 1; url=index.php");

}else{
	$sql = ("INSERT INTO url(URL) VALUES('$url')");
	if(!mysqli_query($con, $sql)){
		echo "Not Inserted";
	}else{
		echo "Inserted";
		header("Refresh: 1; url=index.php");
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	

	
</body>
</html>