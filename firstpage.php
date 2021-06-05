<?php include("connection.php");?>
<!DOCTYPE html>
<html>
 <head>
   <!-- font awsm -->
   <script src="https://kit.fontawesome.com/6eb560e7d2.js" crossorigin="anonymous"></script>
   <!-- font awsm end -->
   <!-- for popup -->
  <style>
  /* The popup form - hidden by default */
  .form-popup 
  {
   padding-left: 50px;
   display: none;
   position: fixed;
   border: 1px solid #f1f1f1;
   z-index: 9;
  }

  /* Add styles to the form container */
  .form-container 
  {
    max-width: 500px;
    padding: 10px;
    background-color: white;
  }
  </style>
	<!-- end pop -->
	<!-- bootstrap link strat-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- bootstrap link end -->

 </head>
 <body>
   <div class="container" style="padding-top: 50px;">
   	 <div class="row">
       <div class="col-md-3">
         <h1>User Records</h1>
       </div>
       <div class="col-md-6"></div>
        <div class="col-md-3" style="margin-left:0px;">
          <!-- adding new emplyoo -->
          <button class="open-button" onclick="openForm()">Add New</button>
        	<div class="form-popup" id="myForm">
           <form method="POST" action="database.php" enctype="multipart/form-data" class="form-container">
              <h1>Add new record</h1>
              <label for="email"><b>Email</b></label>
              <input style="margin-left:70px;" type="text" placeholder="Enter Email" name="email" required><br>
              <label for="name"><b>name</b></label>
              <input style="margin-left:70px;" type="name" placeholder="Enter name" name="name" required><br>
              <label><b>Date of Joining</b></label>
              <input type="Date" name="dateofjoin" required><br>
              <label><b>Date of Leaving</b></label>
              <input type="Date" name="dateofleaving" required><br>
              <input type="checkbox" id="working" name="stillworking" value="yes">
              <label for="working">Still working</label><br>
              <label for="f1"><b>Upload image
              <i class="fas fa-upload"></i></b></label>
              <input id="f1" style="display: none;" type="file" name="img[]" required><br>
              <input type="submit" name="save" value="save">
              <button type="button" name="close" style="background-color:#efefef;margin-left:100px;border-color: black;text-align:center;font-size:11px;" class="btn cancel" onclick="closeForm()">close</button>
           </form>
          </div>
        <!-- end emplyoo -->
       </div>
      </div>
     </div>
     <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<table border="1"  style="width:90%;">
    				<tr style="border: 1px solid black;">
    					<th>Avator</th>
    					<th>Name</th>
    					<th>Email</th>
    					<th>Experience</th>
    					<th></th>
    			  	</tr>
    				  <?php
    					$q=mysqli_query($db,"SELECT * FROM employee");
    					while ($row=mysqli_fetch_array($q)) 
              {
                ?>
                <tr>
                <td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="100" height="100">';?></td>
                <?php
                echo"
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>";
                $datetime1 = new DateTime($row['dateofjoin']);
                $datetime2 = new DateTime($row['dateofleaving']);
                $interval = $datetime1->diff($datetime2);
                echo $interval->format('%y years %m months ');
                echo" </td>
                <td><a href='delete.php?hn=$row[id]'>";?><i  style="color:black;" class="fas fa-times"> Remove
                </i><?php echo"</td>
                </tr>
                ";
    					}?>
          </table>
    		</div>	
    	</div>
    </div>
<!-- javascript for form strt -->
            <script>
            function openForm() {
              document.getElementById("myForm").style.display = "block";
            }
            
            function closeForm() {
              document.getElementById("myForm").style.display = "none";
            }
            </script>
<!-- js for form end -->
  </body>
</html>