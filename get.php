<?php
function to10( $num, $b=62) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $limit = strlen($num);
  $res=strpos($base,$num[0]);
  for($i=1;$i<$limit;$i++) {
    $res = $b * $res + strpos($base,$num[$i]);
  }
  return $res;
}
$conn=mysqli_connect('127.0.0.1','root','','link');
$id_62 = $_GET["u"];
$id = to10($id_62);
$query="SELECT URL FROM url WHERE id = $id";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
$full_url = $row["URL"];
$query1= "UPDATE url SET view = view+1 WHERE id = $id";
mysqli_query($conn,$query1);

header("Location: $full_url");
}
?>