<?php
  include("connection.php");
  $iid=$_GET['hn'];
  $query="DELETE FROM employee WHERE id ='$iid'"; 
  $data=mysqli_query($db,$query);
  if($data)
  {
    function function_alert($message) 
    {  
      $page="firstpage.php"; 
      // Display the alert box  
      echo"<script> 
      alert('$message'); 
      window.location.href =('$page')
      </script>";
    } 
   // Function call 
    function_alert("Removed");
  }
  else
  {
    echo "not remove";
  }
?>
