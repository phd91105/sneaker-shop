<?php
//fetch.php
if(isset($_POST["category"]))
{
 $connect = mysqli_connect("127.0.0.1", "root", "", "sneaker_db");
 $output = '';
 
  $query = "SELECT * FROM tbl_category WHERE catName = '".$_POST["catName"]."'";
  $result = mysqli_query($connect, $query);
    $output .= '<option value="">Select size</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option>'.$row["catSize"].'</option>';
  }
 	echo $output;

 }
?>

