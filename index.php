<?php 
$conn=mysqli_connect('127.0.0.1','root','','link');
$query="SELECT * FROM url";
$result=mysqli_query($conn,$query);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>URL Shortener </title>
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet'>
<style>
body {
    font-family: 'Arvo';font-size: 22px;
}
</style>
  </head>


<body>
<!-- Header -->
<form action="insert.php" method="POST">
<div class="container">
  <h1 align="center" style="padding: 50px;">URL Shortener</h1>
</div>

<div class="container">
  <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Input URL here" aria-label="URL" aria-describedby="basic-addon2" name="q">
  <div class="input-group-append">
    <button class="btn btn-info" type="Submit">Submit</button>
  </div>
</div>
</div>
</form>

<!-- Table --> 
<div class="container" style="font-size: 16px;">
  <table class="table" style="padding: 10px;"> 
    
<thead>
  <tr>
<th scope="col">Full URL</th>
<th scope="col">Shortened URL</th>
<th scope="col">URL Visit Count</th>
<th scope="col">Created At</th>
<th scope="col">Options</th>

  </tr>
</thead>
<?php 
    function toBase($num, $b=62) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $r = $num  % $b ;
  $res = $base[$r];
  $q = floor($num/$b);
  while ($q) {
    $r = $q % $b;
    $q =floor($q/$b);
    $res = $base[$r].$res;
  }
  return $res;
}

while($row = mysqli_fetch_array($result)){
  
  $id = $row["ID"];
  $id_62 = toBase($id);
  $url= $row["URL"];
  $surl="http://localhost/wizard/get.php?u=$id_62";
  $view = $row["view"];
  $date = date("Y-m-d");
  echo "<tr><td>$url</td><td>$surl</td><td>$view</td><td>$date</td><td><a class='btn btn-danger'href='delete.php?del=$id'>Delete</a></td></tr>";


}



?>
  

</table>
</div>


    





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
