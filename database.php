<!-- php start  -->
    <?php
    include("connection.php"); 
    $a1=$_POST['email'];
    $a2=$_POST['name'];
    $a3=$_POST['dateofjoin'];
    $a4=$_POST['dateofleaving'];
    $a5=$_POST['stillworking'];
    if($a4>=$a3)
    {        
      if(isset($_POST['save']))
      {
         $filename=$_FILES['img']['name'];
         $tmpname=$_FILES['img']['tmp_name'];
         $filetype=$_FILES['img']['type'];
         for($i=0;$i<=count($tmpname)-1;$i++)
         { 
          $name=addslashes($filename[$i]);
          $tmp=addslashes(file_get_contents($tmpname[$i]));
          $h=mysqli_query($db,"INSERT INTO employee (`email`, `name`, `dateofjoin`, `dateofleaving`,`stillworking`,`img`)VALUES ('$a1','$a2','$a3','$a4','$a5','$tmp')");
          if($h)
          {
            function function_alert($message) 
            {   
              // Display the alert box  
              $page="firstpage.php";
              echo"<script> 
              alert('$message'); 
              window.location.href =('$page')
              </script>"; 
            } 
            // Function call 
           function_alert("inserted");
          }
          else
          {
            function_alert("not inserted");}
          }
      }
    }
    else
    {
      $page="firstpage.php";
      echo "<script>alert('date is not valid plese enter correct date');
           window.location.href =('$page')
        </script>";
    }

?>
<!-- php end -->