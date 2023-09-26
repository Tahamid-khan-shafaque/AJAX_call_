<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cakephp4");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM employee 
  WHERE name LIKE '%".$search."%'
  OR address LIKE '%".$search."%' 
  OR gender LIKE '%".$search."%' 
  OR designation LIKE '%".$search."%' 
  OR age LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM employee  ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th> Name</th>
     <th>address</th>
     <th>gender</th>
     <th>description</th>
     <th>age</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["gender"].'</td>
    <td>'.$row["designation"].'</td>
    <td>'.$row["age"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>