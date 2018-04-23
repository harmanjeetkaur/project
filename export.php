<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "users");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM users";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>id</th>  
                         <th>user_name</th> 
                         <th>user_pass</th>
                         <th>user_email</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["user_name"].'</td>  
                         <td>'.$row["user_pass"].'</td>                           
                         <td>'.$row["user_email"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>